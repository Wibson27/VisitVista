# app/interfaces/routes/dashboard.py
from flask import Blueprint, render_template, request, redirect, url_for, session
from app.infrastructure.database import get_db

dashboard_bp = Blueprint('dashboard', __name__)

@dashboard_bp.route('/')
def select_business():
    # Initial business selection page
    return render_template('dashboard/business_select.html')

@dashboard_bp.route('/set-business', methods=['POST'])
def set_business():
    business_id = request.form.get('business_id')
    if business_id:
        session['business_id'] = business_id
        return redirect(url_for('dashboard.dashboard_view'))
    return redirect(url_for('dashboard.select_business'))

@dashboard_bp.route('/dashboard')
def dashboard_view():
    business_id = session.get('business_id')
    if not business_id:
        return redirect(url_for('dashboard.select_business'))

    with get_db() as cur:
        # Get business places
        cur.execute("""
            SELECT p.*, pi.image_url
            FROM places p
            LEFT JOIN place_images pi ON p.id = pi.place_id
            WHERE p.business_id = %s
        """, [business_id])
        places = cur.fetchall()

        return render_template('dashboard/home.html', places=places)

@dashboard_bp.route('/insights')
def insights_view():
    business_id = session.get('business_id')
    if not business_id:
        return redirect(url_for('dashboard.select_business'))

    with get_db() as cur:
        cur.execute("""
            SELECT city,
                   SUM(local_visitors) as total_local,
                   SUM(foreign_visitors) as total_foreign,
                   AVG(hotel_occupancy_rate) as avg_occupancy
            FROM tourism_statistics
            GROUP BY city
        """)
        statistics = cur.fetchall()

        return render_template('dashboard/insights.html', statistics=statistics)

@dashboard_bp.route('/statistics')
def statistics_view():
    business_id = session.get('business_id')
    if not business_id:
        return redirect(url_for('dashboard.select_business'))

    with get_db() as cur:
        cur.execute("""
            SELECT p.name,
                   COUNT(b.id) as total_bookings,
                   AVG(r.rating) as avg_rating,
                   SUM(b.total_price) as total_revenue
            FROM places p
            LEFT JOIN bookings b ON p.id = b.place_id
            LEFT JOIN reviews r ON p.id = r.place_id
            WHERE p.business_id = %s
            GROUP BY p.id
        """, [business_id])
        place_stats = cur.fetchall()

        return render_template('dashboard/statistics.html', statistics=place_stats)

@dashboard_bp.route('/reviews')
def reviews_view():
    business_id = session.get('business_id')
    if not business_id:
        return redirect(url_for('dashboard.select_business'))

    with get_db() as cur:
        cur.execute("""
            SELECT p.name, r.rating, r.comment, r.created_at,
                   u.name as user_name
            FROM places p
            JOIN reviews r ON p.id = r.place_id
            JOIN users u ON r.user_id = u.id
            WHERE p.business_id = %s
            ORDER BY r.created_at DESC
        """, [business_id])
        reviews = cur.fetchall()

        return render_template('dashboard/reviews.html', reviews=reviews)
      
@dashboard_bp.route('/test')
def test_view():
    return render_template('dashboard/test.html')
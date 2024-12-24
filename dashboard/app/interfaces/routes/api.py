# app/interfaces/routes/api.py
from flask import Blueprint, request, jsonify
from app.infrastructure.database import get_db
import os
from werkzeug.utils import secure_filename

api_bp = Blueprint('api', __name__)

UPLOAD_FOLDER = 'app/presentation/static/images/places'
ALLOWED_EXTENSIONS = {'png', 'jpg', 'jpeg', 'gif'}

def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

@api_bp.route('/places', methods=['GET'])
def get_places():
    try:
        business_id = request.headers.get('X-Business-ID')
        with get_db() as cur:
            cur.execute("""
                SELECT p.*, pi.image_url
                FROM places p
                LEFT JOIN place_images pi ON p.id = pi.place_id
                WHERE p.business_id = %s
            """, [business_id])
            places = cur.fetchall()
            return jsonify(places)
    except Exception as e:
        return jsonify({'message': str(e)}), 500

@api_bp.route('/places', methods=['POST'])
def create_place():
    try:
        data = request.form
        image = request.files.get('image')
        business_id = request.headers.get('X-Business-ID')

        with get_db() as cur:
            # Insert place
            cur.execute("""
                INSERT INTO places (business_id, name, description, location, city,
                                  price, capacity, category)
                VALUES (%s, %s, %s, %s, %s, %s, %s, %s)
            """, [
                business_id, data['name'], data['description'],
                data['location'], data['city'], data['price'],
                data['capacity'], data.get('category', 'General')
            ])

            place_id = cur.connection.insert_id()

            # Handle image upload
            if image and allowed_file(image.filename):
                if not os.path.exists(UPLOAD_FOLDER):
                    os.makedirs(UPLOAD_FOLDER)

                filename = secure_filename(f"{place_id}_{image.filename}")
                image_path = os.path.join(UPLOAD_FOLDER, filename)
                image.save(image_path)

                # Save image URL to database
                cur.execute("""
                    INSERT INTO place_images (place_id, image_url)
                    VALUES (%s, %s)
                """, [place_id, f"images/places/{filename}"])

            return jsonify({'message': 'Place created successfully', 'id': place_id}), 201

    except Exception as e:
        return jsonify({'message': str(e)}), 500

@api_bp.route('/places/<place_id>', methods=['GET'])
def get_place(place_id):
    try:
        with get_db() as cur:
            cur.execute("""
                SELECT p.*, pi.image_url
                FROM places p
                LEFT JOIN place_images pi ON p.id = pi.place_id
                WHERE p.id = %s
            """, [place_id])
            place = cur.fetchone()

            if not place:
                return jsonify({'message': 'Place not found'}), 404

            return jsonify(place)

    except Exception as e:
        return jsonify({'message': str(e)}), 500

@api_bp.route('/places/<place_id>', methods=['PUT'])
def update_place(place_id):
    try:
        data = request.form
        image = request.files.get('image')
        business_id = request.headers.get('X-Business-ID')

        with get_db() as cur:
            # Verify ownership
            cur.execute("SELECT business_id FROM places WHERE id = %s", [place_id])
            place = cur.fetchone()
            if not place or place['business_id'] != business_id:
                return jsonify({'message': 'Unauthorized'}), 403

            # Update place details
            cur.execute("""
                UPDATE places
                SET name = %s, description = %s, location = %s,
                    city = %s, price = %s, capacity = %s
                WHERE id = %s AND business_id = %s
            """, [
                data['name'], data['description'], data['location'],
                data['city'], data['price'], data['capacity'],
                place_id, business_id
            ])

            # Handle new image upload
            if image and allowed_file(image.filename):
                filename = secure_filename(f"{place_id}_{image.filename}")
                image_path = os.path.join(UPLOAD_FOLDER, filename)
                image.save(image_path)

                # Update or insert image URL
                cur.execute("""
                    INSERT INTO place_images (place_id, image_url)
                    VALUES (%s, %s)
                    ON DUPLICATE KEY UPDATE image_url = VALUES(image_url)
                """, [place_id, f"images/places/{filename}"])

            return jsonify({'message': 'Place updated successfully'})

    except Exception as e:
        return jsonify({'message': str(e)}), 500

@api_bp.route('/places/<place_id>', methods=['DELETE'])
def delete_place(place_id):
    try:
        business_id = request.headers.get('X-Business-ID')

        with get_db() as cur:
            # Verify ownership
            cur.execute("SELECT business_id FROM places WHERE id = %s", [place_id])
            place = cur.fetchone()
            if not place or place['business_id'] != business_id:
                return jsonify({'message': 'Unauthorized'}), 403

            # Delete associated images first
            cur.execute("SELECT image_url FROM place_images WHERE place_id = %s", [place_id])
            images = cur.fetchall()
            for image in images:
                image_path = os.path.join('app/presentation/static', image['image_url'])
                if os.path.exists(image_path):
                    os.remove(image_path)

            # Delete place and associated records
            cur.execute("DELETE FROM place_images WHERE place_id = %s", [place_id])
            cur.execute("DELETE FROM places WHERE id = %s AND business_id = %s", [place_id, business_id])

            return jsonify({'message': 'Place deleted successfully'})

    except Exception as e:
        return jsonify({'message': str(e)}), 500

# Statistics API endpoints
@api_bp.route('/statistics', methods=['GET'])
def get_statistics():
    try:
        business_id = request.headers.get('X-Business-ID')

        with get_db() as cur:
            # Get overall statistics
            cur.execute("""
                SELECT
                    COUNT(p.id) as total_places,
                    COUNT(DISTINCT b.id) as total_bookings,
                    AVG(r.rating) as average_rating,
                    SUM(b.total_price) as total_revenue
                FROM places p
                LEFT JOIN bookings b ON p.id = b.place_id
                LEFT JOIN reviews r ON p.id = r.place_id
                WHERE p.business_id = %s
            """, [business_id])
            overall_stats = cur.fetchone()

            # Get per-place statistics
            cur.execute("""
                SELECT
                    p.name,
                    COUNT(b.id) as booking_count,
                    AVG(r.rating) as avg_rating,
                    SUM(b.total_price) as revenue
                FROM places p
                LEFT JOIN bookings b ON p.id = b.place_id
                LEFT JOIN reviews r ON p.id = r.place_id
                WHERE p.business_id = %s
                GROUP BY p.id
            """, [business_id])
            place_stats = cur.fetchall()

            return jsonify({
                'overall': overall_stats,
                'places': place_stats
            })

    except Exception as e:
        return jsonify({'message': str(e)}), 500

# Insights API endpoints
@api_bp.route('/insights', methods=['GET'])
def get_insights():
    try:
        business_id = request.headers.get('X-Business-ID')

        with get_db() as cur:
            # Get booking trends
            cur.execute("""
                SELECT
                    DATE_FORMAT(booking_date, '%Y-%m') as month,
                    COUNT(*) as booking_count,
                    SUM(total_price) as revenue
                FROM bookings b
                JOIN places p ON b.place_id = p.id
                WHERE p.business_id = %s
                GROUP BY DATE_FORMAT(booking_date, '%Y-%m')
                ORDER BY month DESC
                LIMIT 12
            """, [business_id])
            booking_trends = cur.fetchall()

            # Get rating trends
            cur.execute("""
                SELECT
                    DATE_FORMAT(r.created_at, '%Y-%m') as month,
                    AVG(r.rating) as avg_rating,
                    COUNT(*) as review_count
                FROM reviews r
                JOIN places p ON r.place_id = p.id
                WHERE p.business_id = %s
                GROUP BY DATE_FORMAT(r.created_at, '%Y-%m')
                ORDER BY month DESC
                LIMIT 12
            """, [business_id])
            rating_trends = cur.fetchall()

            return jsonify({
                'bookings': booking_trends,
                'ratings': rating_trends
            })

    except Exception as e:
        return jsonify({'message': str(e)}), 500
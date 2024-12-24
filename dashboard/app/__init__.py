# app/__init__.py
from flask import Flask
from app.infrastructure.config import Config
from app.infrastructure.database import mysql
import os

def create_app():
    app = Flask(__name__,
                template_folder='presentation/templates',
                static_folder='presentation/static')
    app.config.from_object(Config)
    app.secret_key = os.urandom(24)

    mysql.init_app(app)

    from app.interfaces.routes.dashboard import dashboard_bp
    from app.interfaces.routes.api import api_bp

    app.register_blueprint(dashboard_bp)
    app.register_blueprint(api_bp, url_prefix='/api')

    return app
# app/infrastructure/database.py
from flask_mysqldb import MySQL
from contextlib import contextmanager

mysql = MySQL()

@contextmanager
def get_db():
    try:
        cur = mysql.connection.cursor()
        yield cur
        mysql.connection.commit()
    except Exception as e:
        mysql.connection.rollback()
        raise e
    finally:
        cur.close()
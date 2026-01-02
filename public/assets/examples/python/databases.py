import MySQLdb

DB_HOST = 'localhost'
DB_USER = 'root'
DB_NAME = 'academic-ai-001'
DB_PASS = ''

def run_query(query = ''):
    data = [DB_HOST, DB_USER, DB_PASS, DB_NAME]
    conn = MySQLdb.connect(*data)
    cursor = conn.cursor()
    cursor.execute(query)

    if query.upper().startswith('SELECT'):
        data = cursor.fetchall()
    else:
        conn.commit()
        data = None

    cursor.close()
    conn.close()

    return data

run_query("INSERT INTO subject (description) values('Cálculo I') ")
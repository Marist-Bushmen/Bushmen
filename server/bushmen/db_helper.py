#!/usr/bin/python3
import psycopg2
from collections import OrderedDict

db_login = {
    'database': 'bushmen',
    'user': 'daniel',
    'password': 'Red0nions',
    'host': 'database',
    'port': 5432
}

# Connect to the database and return the connection and cursor
def connectToDB():
    try:
        conn = psycopg2.connect(**db_login)
        cur = conn.cursor()
        return conn, cur
    except:
        raise ValueError('Unable to connect to the database')

# Run any query and return data if there is any
def query(sql):
    conn, cur = connectToDB()
    try:
        query = cur.mogrify(sql)
        cur.execute(query)
        conn.commit()
        results = cur.fetchall()
        conn.close()

        if sql.split(' ')[0].lower() in ['insert','delete','update']:
            return True
        else:
            return results
    except Exception as e:
        print (e)

def makeQuoteDict(quotes):
    results = []

    for quote in quotes:
        print(quote[4])
        q = {
            'qid':quote[0],
            'quote':quote[1],
            'author':quote[2],
            'date':quote[3],
            'context':quote[4]
        }

        results.append(q)
    return results
   



def getQuotes():
    # Get a DB connection

    sql = """
        SELECT *
        FROM Quotes
    """
    quotes = query(sql)
    
    return makeQuoteDict(quotes)


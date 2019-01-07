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
        return False

def makeQuoteDict(quotes):
    results = []

    for quote in quotes:
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

def searchQuotes(inquiry):
    clause = ''
    if 'author=' in inquiry:
        inquiry = inquiry.split('=')[1]
        clause = f'WHERE author LIKE \'{inquiry}\''
    else:
        clause = f'WHERE quote LIKE \'{inquiry}\''

    sql = f"""
        SELECT *
        FROM quotes
        {clause}
        ORDER BY date DESC;
    """
    quotes = query(sql)
    
    return makeQuoteDict(quotes)

def createQuote(*args):
    author = args[0]
    quote = args[1]
    context = args[2]
    date = args[3]

    sql = f"""
        INSERT INTO Quotes (quote, author, q_date, q_descr)
        VALUES ('{quote}','{author}', '{date}', '{context}');
    """

    insert = query(sql)

    if not insert:
        return 0
    return 1

def deleteQuote(qid):
    sql = f"""
        DELETE 
        FROM Quotes
        WHERE qid={qid};
    """
    delete = query(sql)

    if not delete:
        return 0
    return 1
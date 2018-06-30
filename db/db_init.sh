#!/bin/bash
# /usr/bin/mysqld_safe --skip-grant-tables &
MYSQL_ROOT_PASSWORD="null"
filename="/docker-entrypoint-initdb.d/master.sql"
mysql -u root -p$MYSQL_ROOT_PASSWORD Quotes_db < $filename
echo "Database Dump Complete"

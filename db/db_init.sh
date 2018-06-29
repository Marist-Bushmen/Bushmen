#!/bin/bash
# /usr/bin/mysqld_safe --skip-grant-tables &
filename="/docker-entrypoint-initdb.d/master.sql"
mysql -u root -proot Quotes_db < $filename
echo "DB transfered!!!!"

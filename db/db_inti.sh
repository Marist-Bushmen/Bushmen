# #!/bin/bash
/usr/bin/mysqld_safe --skip-grant-tables &
sleep 5
backup_path="/home/dgisolfi/projects/bushmen-site/dataDumps"
#backup_path="/Users/daniel/code-repos/Bushmen/data"

#Go to backup folder
cd $backup_path
latestDB=$(ls -t | head -n1)

#Create the database and source the most recent backup
mysql -u root -e "CREATE DATABASE Quotes_db"
mysql -u root Quotes_db < $backup_path/$latestDB

# Manual way
# docker-compose exec db mysql -u root -p Quotes_db
# source /var/mysql/Quotes_db.sql

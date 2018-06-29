#!/bin/bash

#This is to run on the VM itself in order to access the docker container
#and backup the DB

# Database credentials
host="null"
user="null"
password="null"
db_name="null"

#Path to data backups
backup_path="/home/dgisolfi/projects/bushmen-site/dataDumps/backup"
#backup_path="/Users/daniel/code-repos/Bushmen/data"
date=$(date +"%d-%b-%Y")

# Set default file permissions
umask 177

# Dump database into SQL file
docker exec bushmen_db_1 mysqldump --user=$user --password=$password --host=$host $db_name > $backup_path/$db_name-$date.sql

# Delete files older than 15 days
# find $backup_path/* -mtime +15 -exec rm {} \;

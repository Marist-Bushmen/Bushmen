#!/bin/bash

#This is to run on the VM itself in order to access the docker container
#and backup the DB

# Database credentials
MYSQL_ROOT_PASSWORD="null"

#Path to data backups
backup_path="/home/dgisolfi/projects/bushmen-site/db/backup"
date=$(date +"%d-%b-%Y")

# Set default file permissions
umask 177

# Dump database into SQL file
docker exec bushmensite_db_1 sh -c 'exec mysqldump --all-databases -uroot -p"$MYSQL_ROOT_PASSWORD"' > $backup_path/$date.sql

#TODO: Remove files older than 30 days

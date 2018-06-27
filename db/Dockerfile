FROM mysql:5.7.13
COPY setup.sh ./var/mysql/db_init.sh
COPY Quotes_db.sql ./var/mysql/Quotes_db.sql
RUN ./var/mysql/db_init.sh

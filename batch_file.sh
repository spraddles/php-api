#!/bin/sh

echo -e "Test message!!"

# Database remove, create, seed, manipulate
#RUN dropdb postgres
#RUN createdb -U postgres postgres

cd /php-api-run/

php artisan migrate --path=database/migrations/2021_04_30_084401_create_tables.php
php artisan migrate --path=database/migrations/2021_05_02_113342_create_temp_table.php

#RUN psql -h 127.0.0.1 -d postgres -U postgres -f ./database/seeders/import.sql
#RUN psql -h 127.0.0.1 -d postgres -U postgres -f ./database/seeders/manipulate.sql

php artisan serve --host=0.0.0.0
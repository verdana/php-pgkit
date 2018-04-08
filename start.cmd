@echo off

set PG_DSN=pgsql:host=localhost;dbname=postgres
set PG_USER=Verdana
set PG_PASSWORD=postgres

D:\php7.1\php.exe -S localhost:80 -t public/

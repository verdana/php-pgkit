@echo off

SET PG_HOST=localhost
SET PG_DBNAME=postgres
SET PG_USER=Verdana
SET PG_PASSWORD=postgres

REM SET PG_DSN=pgsql:host=192.168.0.202;dbname=milky-tea
REM SET PG_USER=postgres
REM SET PG_PASSWORD=postgres

D:\php7.1\php.exe -S localhost:80 -t public/

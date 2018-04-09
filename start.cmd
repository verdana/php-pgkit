@echo off

REM set PG_DSN=pgsql:host=localhost;dbname=postgres
REM set PG_USER=Verdana
REM set PG_PASSWORD=postgres

set PG_DSN=pgsql:host=192.168.0.202;dbname=postgres
set PG_USER=postgres
set PG_PASSWORD=postgres

D:\php7.1\php.exe -S localhost:80 -t public/

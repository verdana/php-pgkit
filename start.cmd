@echo off

SET PG_HOST=localhost
SET PG_DBNAME=postgres
SET PG_USER=Verdana
SET PG_PASSWORD=postgres

REM another machine
if %ComputerName% == VALKYRIE (
    SET PG_HOST=192.168.0.202
    SET PG_DBNAME=postgres
    SET PG_USER=postgres
    SET PG_PASSWORD=postgres
)

D:\php7.1\php.exe -S localhost:80 -t public/

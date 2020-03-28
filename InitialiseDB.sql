DROP USER IF EXISTS 'websiteuser'@'localhost';
DROP DATABASE IF EXISTS bookingsystem;

CREATE DATABASE bookingsystem;

USE bookingsystem;

CREATE USER 'websiteuser'@'localhost'
IDENTIFIED BY 'coit13230user';

GRANT CREATE,SELECT,INSERT,UPDATE,DELETE
ON bookingsystem.*
TO 'websiteuser'@'localhost';

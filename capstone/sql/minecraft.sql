


DROP DATABASE IF EXISTS minecraftserver;
CREATE DATABASE minecraftserver;
USE minecraftserver;

DROP TABLE IF EXISTS mcinstall;
CREATE TABLE mcinstall (
installPath VARCHAR(30) DEFAULT NULL, 
installVersion VARCHAR(10) DEFAULT NULL,
serviceName VARCHAR(30) DEFAULT NULL
);

INSERT INTO mcinstall VALUES
(NULL, NULL, NULL);

DROP TABLE IF EXISTS startup;
CREATE TABLE startup (
maxmem VARCHAR(6) DEFAULT "1024M", 
minmem VARCHAR(6) DEFAULT "1024M",
nogui BOOLEAN DEFAULT TRUE,
pid INT UNSIGNED DEFAULT NULL
);

INSERT INTO startup VALUES
("1024M", "1024M", TRUE, NULL);


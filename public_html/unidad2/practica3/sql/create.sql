CREATE DATABASE hospital_db;

CREATE USER 'hospital_user'@'%' IDENTIFIED WITH mysql_native_password BY 'lorem';

GRANT SELECT ON hospital_db.* TO 'hospital_user'@'%';

FLUSH PRIVILEGES;

CREATE TABLE hospital_db.USERS (
	ID int(11) auto_increment NOT NULL PRIMARY KEY,
	USERNAME varchar(100) unique NOT NULL,
	PASSWORD varchar(100) NOT NULL
);

CREATE TABLE hospital_db.PATIENTS (
	ID int(11) auto_increment NOT NULL PRIMARY KEY,
	NAME varchar(100) NOT NULL,
	FIRST_SURNAME varchar(100) NOT NULL,
	SECOND_SURNAME varchar(100) NOT NULL
);
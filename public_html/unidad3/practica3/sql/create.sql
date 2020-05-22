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

INSERT INTO hospital_db.USERS (USERNAME ,PASSWORD ) VALUES 
('user', '5f4dcc3b5aa765d61d8327deb882cf99');

INSERT INTO hospital_db.PATIENTS (NAME, FIRST_SURNAME, SECOND_SURNAME) VALUES 
('Hugo', 'Sánchez', 'Velázquez'),
('Daniela Michelle', 'Rosales', 'López'),
('Sergio', 'Promotor', 'Sánchez');
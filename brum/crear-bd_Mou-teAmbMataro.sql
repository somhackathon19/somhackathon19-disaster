DROP DATABASE IF EXISTS hackathon;
CREATE DATABASE hackathon CHARACTER SET utf8 COLLATE utf8_spanish_ci;
use hackathon;
CREATE TABLE users (
	dni VARCHAR(200) PRIMARY KEY,
	username VARCHAR(50) NOT NULL,
	email VARCHAR(75) NOT NULL,
	password VARCHAR(128) NOT NULL,
	name VARCHAR(100) NOT NULL,
	points INT NOT NULL DEFAULT 0,
	access_level INT NOT NULL DEFAULT 1
);

CREATE TABLE activities (
	id		INT PRIMARY KEY AUTO_INCREMENT,
	nombre		VARCHAR(50)	NOT NULL,
	coord		VARCHAR(50)	NOT NULL,
	description	VARCHAR(180)	,
	schedule	DATE			,
	time		TIME			,
    likes		INT	DEFAULT 0	,
    dislikes	INT	DEFAULT 0	,
    min_persons	INT	NOT NULL,
    status VARCHAR(200) NOT NULL,
	max_persons 	INT
);

CREATE TABLE advertising (
	id 	INT PRIMARY KEY AUTO_INCREMENT,
	url	VARCHAR(100),
	image 	VARCHAR(65000) 	NOT NULL,
	enterprise	VARCHAR(50)	NOT NULL,
	click_count	INT	NOT NULL DEFAULT 0,
	view_count	INT	NOT NULL DEFAULT 0
);

CREATE TABLE chat (
	id 	INT PRIMARY KEY AUTO_INCREMENT,
  	marker_id INT NOT NULL,
	message	VARCHAR(180) NOT NULL,
	user_id	VARCHAR(200) NOT NULL,
	foreign key (user_id) references users(dni)
        		on delete cascade
       			on update cascade
);

CREATE TABLE places (
	id		INT PRIMARY KEY AUTO_INCREMENT,
	name		VARCHAR(20)	NOT NULL,
	coord		VARCHAR(50)	NOT NULL,
description	VARCHAR(180)			
);

CREATE TABLE rewards (
	id	INT	PRIMARY KEY AUTO_INCREMENT,
	name	VARCHAR(100)	NOT NULL,
	description	VARCHAR(180)	DEFAULT '--------------',
	image	VARCHAR(65000),
	price	INT	DEFAULT 9999 NOT NULL	
);

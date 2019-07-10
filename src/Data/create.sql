/*
/*  usage: 	mysql -u root -p < create.sql
/*
/*			prompt for password
/*
/* 
 */

CREATE DATABASE IF NOT EXISTS flowers;

USE flowers;

drop table if exists user;
create table user
(
	id int(6) unsigned auto_increment primary key,
	name varchar(100) not null,
	email varchar(100) not null,
	password varchar(255) not null
);

drop table if exists flower;
create table flower 
(
 	flowerid int(6) unsigned auto_increment primary key,
	fname varchar(40) not null,
	fvariety varchar(40) not null,
	fcontainer varchar(40) not null,
	title varchar(50),
	blurb text 
);

drop table if exists price;
create table price
(
	container varchar(40) not null primary key,
	retail decimal(5,2) not null,
	wholesale decimal(5,2) not null
);

drop table if exists images;
create table images
(
	flowerid int(6) unsigned,
	filename varchar(100)
);

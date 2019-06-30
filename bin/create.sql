/*
/*  usage: 	mysql -u root -p < create.sql
/*
/*	(prompted for password)
/* */

create database flowers;
use flowers;

create table flower 
(
 	flowerid int(6) unsigned auto_increment primary key,
	fname varchar(40) not null,
	fvariety varchar(40) not null,
	fcontainer varchar(40) not null,
	title varchar(50),
	blurb text 
);

create table price
(
	container varchar(40) not null primary key,
	retail decimal(5,2) not null,
	wholesale decimal(5,2) not null
);

create table images
(
	flowerid int(6) unsigned,
	filename varchar(100)
);

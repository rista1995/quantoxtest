 create database quantox_test;
 
 use database quantox_test;
 
 create table users( id int(6) unsigned not null auto_increment, email varchar(50) not null, name varchar(50) not null, 
password varchar(50) not null, primary key(id)) ENGINE= InnoDB;
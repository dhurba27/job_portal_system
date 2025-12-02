create database job_portal;
use job_portal;

create table Users (user_id int primary key auto_increment, name varchar(255) not null,
email varchar(255) not null, password varchar(255) not null, role enum('user', 'admin', 'employer') not null);
create database job_portal;
use job_portal;

create table Users (user_id int primary key auto_increment, name varchar(255) not null,
email varchar(255) not null, password varchar(255) not null, role enum('user', 'admin', 'employer') not null);

create table Jobs (job_id int primary key auto_increment, job_title varchar(255) not null, company varchar(255) not null,
location varchar(255) not null, job_type varchar(255) not null, job_description text not null, job_requirement text not null,
salary varchar(255) DEFAULT 'Not Available',deadline date not null, image varchar(255), posted_on timestamp DEFAULT CURRENT_TIMESTAMP,
created_by int not null, foreign key(created_by) references Users(user_id));

create table Application (application_id int primary key auto_increment, name varchar(255) not null, 
email varchar(255) not null, contact varchar(255) not null,
address varchar(255) not null, cover_letter text not null, cv_path varchar(255) not null,
status enum('Pending', 'Approved', 'Rejected') default 'Pending', applied_on timestamp DEFAULT CURRENT_TIMESTAMP, applied_by int not null,
job_id int not null, foreign key(applyed_by) references Users(user_id), foreign key(job_id) references Jobs(job_id));

CREATE TABLE profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNIQUE,
    bio TEXT,
    address VARCHAR(255),
    contact VARCHAR(20),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
create database bookhaven;

use bookhaven;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    username VARCHAR(200) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    address VARCHAR(200) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    password VARCHAR(225) NOT NULL,
    token VARCHAR(225) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    INDEX idx_login (username(100), email(100), password(100)) --To optimize the login process using either username or email along with password
)CHARACTER SET utf8;

-- By setting the character set to utf8, each character uses up to 3 bytes instead of 4 (as with utf8mb4), thus reducing the total byte count for the index.

CREATE TABLE donation_book (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(225),
    cover VARCHAR(225),
    author VARCHAR(100),
    publisher VARCHAR(100),
    ISBN VARCHAR(225) UNIQUE,
    book_description VARCHAR(225),
    category VARCHAR(100)
);

create table faculty (
    faculty_id int auto_icrement ,
    faculty_name varchar(225),
    primary key (faculty_id)
);

create table faculty_deparment (
    faculty_deparment_id int auto_icrement,
    faculty_id int,
    faculty_deparment_name varchar(225),
    primary key (faculty_deparment_id),
    FOREIGN key (faculty_id) REFERENCES faculty(faculty_id)
);

create table faculty_book_details (
    details_id int auto_icrement,
    faculty_deparment_id int,
    book_id int,
    status bool,
);

create table book_deails (
    book_detail_id int auto_icrement,
    isbn varchar(225),
    book_name varchar(225),
    price varchar(100),

);
<?php


// sql to create table
$create_table_feedback = "CREATE TABLE feedbacks (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
email VARCHAR(100) NOT NULL,
comment TEXT  NOT NULL,
rating TINYINT(1) UNSIGNED  NOT NULL,
advantage VARCHAR(255),
disadvantages VARCHAR (255),
user_ip VARCHAR(255) NOT NULL,
user_agent VARCHAR (255) NOT NULL,
created_at INT(11) NOT NULL,
)";


// sql to create products
$create_table_articles = "CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
)";

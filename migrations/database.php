<?php
include_once '../helpers/ConnectDatabase.php';
include_once '../config/config.php';

$conn = ConnectDatabase::connectDb($config);

$create_table_articles = "
CREATE TABLE IF NOT EXISTS `products`(
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `created_at` INT(11) NOT NULL    
)ENGINE=InnoDB;
";
$conn->exec($create_table_articles);

$alter_table_otzivi = "
CREATE TABLE IF NOT EXISTS `otzivi`(
    `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `product_id` INT(11) NOT NULL,
    `full_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR (100) NOT NULL,
    `comment` TEXT(500) NOT NULL,    
    `ratings` TINYINT(1) NOT NULL,
    `advantages` VARCHAR(255)NOT NULL,
    `disadvantages` VARCHAR(255)NOT NULL,
    `user_ip` VARCHAR(255) NOT NULL,
    `user_agent` VARCHAR(255) NOT NULL,
    `file_path` VARCHAR(255) NOT NULL,
    `created_at` INT(11) NOT NULL,
  KEY `idx-product_table-product_id` (`product_id`),
  CONSTRAINT `fk-product_table-product_id` FOREIGN KEY (`product_id`)
  REFERENCES `products` (`id`) ON DELETE CASCADE
)ENGINE=InnoDB;
";
$conn->exec($alter_table_otzivi);


$create_table_articles = "
INSERT INTO `products` (`id`, `name`, `created_at`) VALUES (NULL, '4k tv', '1589556814');
INSERT INTO `products` (`id`, `name`, `created_at`) VALUES (NULL, 'iphone', '1589056914');
INSERT INTO `products` (`id`, `name`, `created_at`) VALUES (NULL, 'samsung', '1589259814');
INSERT INTO `products` (`id`, `name`, `created_at`) VALUES (NULL, 'lamborghini', '1589358814');
";
$conn->exec($create_table_articles);

echo 'init database with success';
die;

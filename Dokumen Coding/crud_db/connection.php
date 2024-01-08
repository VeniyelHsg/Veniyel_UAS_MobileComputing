<?php
$host = "localhost";
$user = "root";
$pass = "";
$name_db = "crud_db"; //database name
$connection = mysqli_connect($host, $user, $pass, $name_db);

if (!$connection) { // if not connected, an error will appear
  die("Connection with database failed: " . mysqli_connect_error());
}

/*CREATE TABLE `product` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `product_name` VARCHAR(255) NULL , `description` TEXT NULL , `purchase_price` INT(11) NULL , `selling_price` INT(11) NULL , `product_image` VARCHAR(255) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;*/
?>
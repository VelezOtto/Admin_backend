<?php 

$link = mysqli_connect("localhost", "root", "", "");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS webshop";
if(mysqli_query($link, $sql)){
    echo "Database webshop  created successfully.\n";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


$link = mysqli_connect("localhost", "root", "", "webshop");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$sql= "CREATE TABLE IF NOT EXISTS products (
  product_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  product_name varchar(45) NOT NULL,
  product_category text(255) NOT NULL,
  product_description text(255) NOT NULL,
  product_price int(11) NOT NULL,
  product_condition set('Used','Renewed','New') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1";


$sql = "INSERT INTO products (product_name, product_category, product_description, product_price, product_condition)
VALUES ('Camera','Fashion','Takes nice pictures','150','New'),
		('Laptop','Laptop','Standart multimedia laptop','300','Renewed'),
		('Shirt','Fashion','Made out of quality silk','50','Used'),
		('Photoshop Lessons','Software, Book','The way to learn Photoshop','100','New'),
		('Edible underwear','Fashion, Food','Not sure about this one','20','New'),
		('Dummy Name','Fashion, Laptop, Food','Dummy Description','150','Used'),
		('Dummy Name2','Fashion, Laptop, Food','Dummy Description2','150','Used'),
		('Dummy Name3','Fashion, Laptop, Food','Dummy Description3','150','Used');";

if (mysqli_query($link, $sql)){
    echo "Table products created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);


?>

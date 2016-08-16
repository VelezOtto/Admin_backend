<?
CREATE TABLE IF NOT EXISTS `webshop` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_category` text(255) NOT NULL,
  `product_description` text(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_condition` set('Used','Renewed','New') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);
 
 ALTER TABLE `products`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;


INSERT INTO products (product_name, product_category, product_description, product_price, product_condition)
VALUES ('Camera','Fashion','Takes nice pictures','150','New');
INSERT INTO products (product_name, product_category, product_description, product_price, product_condition)
VALUES ('Laptop','Laptop','Standart multimedia laptop','300','Renewed');
INSERT INTO products (product_name, product_category, product_description, product_price, product_condition)
VALUES ('Shirt','Fashion','Made out of quality silk','50','Used');
INSERT INTO products (product_name, product_category, product_description, product_price, product_condition)
VALUES ('Photoshop Lessons','Software, Book','The way to learn Photoshop','100','New');
INSERT INTO products (product_name, product_category, product_description, product_price, product_condition)
VALUES ('Edible underwear','Fashion, Food','Not sure about this one','20','New');
INSERT INTO products (product_name, product_category, product_description, product_price, product_condition)
VALUES ('Dummy Name','Fashion, Laptop, Food','Dummy Description','150','Used');
INSERT INTO products (product_name, product_category, product_description, product_price, product_condition)
VALUES ('Dummy Name2','Fashion, Laptop, Food','Dummy Description2','150','Used');
INSERT INTO products (product_name, product_category, product_description, product_price, product_condition)
VALUES ('Dummy Name3','Fashion, Laptop, Food','Dummy Description3','150','Used');

?>

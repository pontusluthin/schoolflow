<?php



$customers_table = 
"CREATE TABLE Customers(
    customer_id INT (10) AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (100) NOT NULL, 
    last_name VARCHAR (100) NOT NULL,
    customer_address VARCHAR (250) NOT NULL, 
    postal_code VARCHAR (50) NOT NULL, 
    city VARCHAR (150) NOT NULL, 
    email VARCHAR (150) NOT NULL,
    phone VARCHAR (150) NOT NULL, 
    customer_password VARCHAR (150) NOT NULL,
    checkbox VARCHAR (10) NULL, 
    created DATETIME  
)";




$db->exec($customers_table); 
echo "Table Customers created successfully";


$products_table = 
"CREATE TABLE Products(
    product_id INT (10) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR (100) NOT NULL, 
    type VARCHAR (100) NOT NULL, 
    month_price VARCHAR (100) NOT NULL; 
    year_price INT (100) NOT NULL, 
    description VARCHAR (1000) NOT NULL
)";

$db->exec($products_table); 
echo "Table Products created successfully";

$orders_table = "CREATE TABLE Orders(
    order_id INT (10) AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL, 
    FOREIGN KEY fk_customers(customer_id)
    REFERENCES Customers(customer_id), 
    product_id INT NOT NULL, 
    FOREIGN KEY fk_products(product_id)
    REFERENCES Products(product_id), 
    date DATETIME NOT NULL
    
)";


$db->exec($orders_table); 

echo "Table Orders created successfully";


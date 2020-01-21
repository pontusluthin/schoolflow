<?php

class Customer {

  private $conn; 
  private $table = 'Orders';

  public $order_id;
  public $first_name; 
  public $last_name; 
  public $customer_address; 
  public $postal_code; 
  public $city; 
  public $email;
  public $phone;
  public $name;
  public $month_price;
  public $date;

  public function __construct() {
    $db = new DBConnect();
    $this->db = $db->pdo;
  }

  public function read_single_customer() {
    $query = 'SELECT  Customers.first_name, Customers.last_name, Customers.customer_address, Customers.postal_code, Customers.city, Customers.email, Customers.phone, Orders.order_id, Products.name, Products.month_price,Orders.date FROM ' . $this->table . '
    JOIN Customers ON Orders.customer_id = Customers.customer_id
    JOIN Products ON Orders.product_id = Products.product_id
    WHERE Customers.email = ?
    LIMIT 0,1';
    $result = $this->db->prepare($query);
    $result->bindParam(1, $this->email);
    $result->execute();
    
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $this->first_name = $row['first_name'];
    $this->last_name = $row['last_name'];
    $this->customer_address = $row['customer_address'];
    $this->postal_code = $row['postal_code'];
    $this->city = $row['city'];
    $this->email = $row['email'];
    $this->phone = $row['phone'];
    $this->order_id = $row['order_id'];
    $this->name = $row['name'];
    $this->month_price = $row['month_price'];
    $this->date = $row['date'];
  }

}
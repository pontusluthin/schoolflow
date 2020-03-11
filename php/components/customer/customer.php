<?php

  //Functions for customer actions

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
    public $customer_id;

    public function __construct() {
      $db = new DBConnect();
      $this->db = $db->pdo;
    }

    public function read_single_customer() {
      $query = 'SELECT  Customers.customer_id, Customers.first_name, Customers.last_name, Customers.customer_address, Customers.postal_code, Customers.city, Customers.email, Customers.phone, Orders.order_id, Products.name, Products.month_price,Orders.date 
      FROM ' . $this->table . '
      JOIN Customers ON Orders.customer_id = Customers.customer_id
      JOIN Products ON Orders.product_id = Products.product_id
      WHERE Customers.email = ?
      LIMIT 0,1';

      $result = $this->db->prepare( $query );
      $result->bindParam( 1, $this->email );
      $result->execute();

      $row = $result->fetch(PDO::FETCH_ASSOC);

      $this->customer_id        = $row['customer_id'];
      $this->first_name         = $row['first_name'];
      $this->last_name          = $row['last_name'];
      $this->customer_address   = $row['customer_address'];
      $this->postal_code        = $row['postal_code'];
      $this->city               = $row['city'];
      $this->email              = $row['email'];
      $this->phone              = $row['phone'];
      $this->order_id           = $row['order_id'];
      $this->name               = $row['name'];
      $this->month_price        = $row['month_price'];
      $this->date               = $row['date'];
    }

    public function update_customer_email() {
      $query = 'UPDATE Customers
      SET email = :email
      WHERE customer_id = :customer_id
      ';

      $result = $this->db->prepare( $query ); 

      //Clean data
      $this->email        = htmlspecialchars( strip_tags( $this->email ));
      $this->customer_id  = htmlspecialchars( strip_tags( $this->customer_id ));

      //Bind data 
      $result->bindParam( ':email', $this->email );
      $result->bindParam( ':customer_id', $this->customer_id );

      //If something works
      if( $result->execute() ) {
        return true; 
      }

      //If something goes wrong 
      printf( "Error: %s. \n", $result->error );
      return false;
    }

  }
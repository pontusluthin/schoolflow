<?php
// 'user' object
class Users{
 
    // database connection and table name
    private $conn;
    private $table = "Customers";
 
    // object properties
    public $customer_id;
    public $first_name;
    public $last_name;
    public $customer_address;
    public $postal_code;
    public $city;
    public $email;
    public $phone;
    public $customer_password;
 
    // constructor
    public function __construct() {
      $db = new DBConnect();
      $this->db = $db->pdo;
    }

  // create new user record
  function create(){
  
    // insert query
    $query = "INSERT INTO " . $this->table . "
            SET
                customer_id = :customer_id,
                first_name = :first_name,
                last_name = :last_name,
                customer_address = :customer_address, 
                postal_code = :postal_code,
                city = :city,
                email = :email,
                phone = :phone,
                customer_password = :customer_password;";

    // prepare the query
    $result = $this->db->prepare($query);

    // sanitize
    $this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
    $this->first_name=htmlspecialchars(strip_tags($this->first_name));
    $this->last_name=htmlspecialchars(strip_tags($this->last_name));
    $this->customer_address=htmlspecialchars(strip_tags($this->customer_address));
    $this->postal_code=htmlspecialchars(strip_tags($this->postal_code));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->phone=htmlspecialchars(strip_tags($this->phone));
    $this->customer_password=htmlspecialchars(strip_tags($this->customer_password));

    // bind the values
    $result->bindParam(':customer_id', $this->customer_id);
    $result->bindParam(':first_name', $this->first_name);
    $result->bindParam(':last_name', $this->last_name);
    $result->bindParam(':customer_address', $this->customer_address);
    $result->bindParam(':postal_code', $this->postal_code);
    $result->bindParam(':city', $this->city);
    $result->bindParam(':email', $this->email);
    $result->bindParam(':phone', $this->phone);
    $result->bindParam(':customer_password', $this->customer_password);

    // hash the password before saving to database
    $password_hash = password_hash($this->customer_password, PASSWORD_BCRYPT);
    $result->bindParam(':customer_password', $password_hash);

    // execute the query, also check if query was successful
    if($result->execute()){
        return true;
    }

    return false;
  }

  function emailExists(){
 
    // query to check if email exists
    $query = "SELECT customer_id, first_name, last_name, customer_address, postal_code, city, phone, customer_password
            FROM " . $this->table . "
            WHERE email = ?
            LIMIT 0,1";
 
    // prepare the query
    $result = $this->db->prepare($query);
 
    // sanitize
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // bind given email value
    $result->bindParam(1, $this->email);
 
    // execute the query
    $result->execute();
 
    // get number of rows
    $num = $result->rowCount();
 
    // if email exists, assign values to object properties for easy access and use for php sessions
    if($num>0){
 
        // get record details / values
        $row = $result->fetch(PDO::FETCH_ASSOC);
 
        // assign values to object properties
        $this->customer_id = $row['customer_id'];
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->customer_address = $row['customer_address'];
        $this->postal_code = $row['postal_code'];
        $this->city = $row['city'];
        $this->phone = $row['phone'];
        $this->customer_password = $row['customer_password'];
        $this->checkbox = $row['checkbox'];
 
        // return true because email exists in the database
        return true;
    }
 
    // return false if email does not exist in the database
    return false;
}

// update a user record
public function update(){
 
  // if password needs to be updated
  $password_set=!empty($this->customer_password) ? ", customer_password = :customer_password" : "";

  // if no posted password, do not update the password
  $query = "UPDATE " . $this->table . "
          SET
              first_name = :first_name,
              last_name = :last_name,
              customer_address = :customer_address,
              postal_code = :postal_code,
              city = :city,
              phone = :phone,
              email = :email
              {$password_set}
          WHERE customer_id = :customer_id";

  // prepare the query
  $result = $this->db->prepare($query);

  // sanitize
    $this->first_name=htmlspecialchars(strip_tags($this->first_name));
    $this->last_name=htmlspecialchars(strip_tags($this->last_name));
    $this->customer_address=htmlspecialchars(strip_tags($this->customer_address));
    $this->postal_code=htmlspecialchars(strip_tags($this->postal_code));
    $this->city=htmlspecialchars(strip_tags($this->city));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->phone=htmlspecialchars(strip_tags($this->phone));


  // bind the values from the form
  $result->bindParam(':first_name', $this->first_name);
  $result->bindParam(':last_name', $this->last_name);
  $result->bindParam(':customer_address', $this->customer_address);
  $result->bindParam(':postal_code', $this->postal_code);
  $result->bindParam(':city', $this->city);
  $result->bindParam(':email', $this->email);
  $result->bindParam(':phone', $this->phone);

  // hash the password before saving to database
  if(!empty($this->customer_password)){
      $this->customer_password=htmlspecialchars(strip_tags($this->customer_password));
      $password_hash = password_hash($this->customer_password, PASSWORD_BCRYPT);
      $result->bindParam(':customer_password', $password_hash);
  }

  // unique ID of record to be edited
  $result->bindParam(':customer_id', $this->customer_id);

  // execute the query
  if($result->execute()){
      return true;
  }

  return false;
}
}
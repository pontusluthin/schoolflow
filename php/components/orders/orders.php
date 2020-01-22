<?php 

class Order {

  private $conn; 
  private $table = 'Orders';

  public $order_id;
  public $customer_id; 
  public $product_id;


  public function __construct() {
    $db = new DBConnect();
    $this->db = $db->pdo;
  }

  public function read() {
    $query = 'SELECT * FROM ' . $this->table;
    $result = $this->db->prepare($query);
    $result->execute();
    return $result;
  }

  public function read_single_product() {
    $query = 'SELECT * FROM ' . $this->table  . ' p 
    WHERE p.product_id = ?
    LIMIT 0,1'; 
    $result = $this->db->prepare($query);
    $result->bindParam(1, $this->order_id);
    $result->execute();
    
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $this->name = $row['name'];
    $this->type = $row['type'];
    $this->product_id = $row['product_id'];
  }

  public function create_order(){
    $query = 'INSERT INTO ' . 
    $this->table . '
    SET
    order_id = :order_id,
    customer_id = :customer_id,
    product_id = :product_id 
    ';

    $result = $this->db->prepare($query); 

    //Clean data
    $this->order_id = htmlspecialchars(strip_tags($this->order_id));
    $this->customer_id = htmlspecialchars(strip_tags($this->customer_id));
    $this->product_id = htmlspecialchars(strip_tags($this->product_id));

    //Bind data 
    $result->bindParam(':order_id', $this->order_id);
    $result->bindParam(':customer_id', $this->customer_id);
    $result->bindParam(':product_id', $this->product_id);
   
    //If something works
    if($result->execute()) {
      return true; 
    }

    //If something goes wrong 
    printf("Error: %s. \n", $result->error);
    return false;
  }
  public function update_product(){
    $query = 'UPDATE ' . 
    $this->table . '
    SET
    name = :name,
    type = :type,
    month_price = :month_price, 
    year_price = :year_price, 
    description = :description
    WHERE product_id = :product_id
    ';

    $result = $this->db->prepare($query); 

    //Clean data
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->type = htmlspecialchars(strip_tags($this->type));
    $this->month_price = htmlspecialchars(strip_tags($this->month_price));
    $this->year_price = htmlspecialchars(strip_tags($this->year_price));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->product_id = htmlspecialchars(strip_tags($this->product_id));

    //Bind data 
    $result->bindParam(':name', $this->name);
    $result->bindParam(':type', $this->type);
    $result->bindParam(':month_price', $this->month_price);
    $result->bindParam(':year_price', $this->year_price);
    $result->bindParam(':description', $this->description);
    $result->bindParam(':product_id', $this->product_id);

    //If something works
    if($result->execute()) {
      return true; 
    }

    //If something goes wrong 
    printf("Error: %s. \n", $result->error);
    return false;
  }

  public function delete_product() {
    $query = 'DELETE FROM ' . $this->table . ' WHERE product_id = :product_id';

    $result = $this->db->prepare($query); 

    $this->product_id = htmlspecialchars(strip_tags($this->product_id));

    $result->bindParam(':product_id', $this->product_id);

      //If something works
    if($result->execute()) {
      return true; 
    }

    //If something goes wrong 
    printf("Error: %s. \n", $result->error);
    return false;
  }
}
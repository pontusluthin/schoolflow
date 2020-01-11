<?php 

class Products {

  private $conn; 
  private $table = 'Products';

  public $product_id;
  public $product_name; 
  public $product_price; 
  public $description; 

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
    $result->bindParam(1, $this->product_id);
    $result->execute();
    
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $this->product_name = $row['product_name'];
    $this->product_price = $row['product_price'];
    $this->description = $row['description'];
  }

  public function create_product(){
    $query = 'INSERT INTO ' . 
    $this->table . '
    SET
    product_name = :product_name,
    product_price = :product_price, 
    description = :description
    ';

    $result = $this->db->prepare($query); 

    //Clean data
    $this->product_name = htmlspecialchars(strip_tags($this->product_name));
    $this->product_price = htmlspecialchars(strip_tags($this->product_price));
    $this->description = htmlspecialchars(strip_tags($this->description));

    //Bind data 
    $result->bindParam(':product_name', $this->product_name);
    $result->bindParam(':product_price', $this->product_price);
    $result->bindParam(':description', $this->description);

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
    product_name = :product_name,
    product_price = :product_price, 
    description = :description
    WHERE product_id = :product_id
    ';

    $result = $this->db->prepare($query); 

    //Clean data
    $this->product_name = htmlspecialchars(strip_tags($this->product_name));
    $this->product_price = htmlspecialchars(strip_tags($this->product_price));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->product_id = htmlspecialchars(strip_tags($this->product_id));

    //Bind data 
    $result->bindParam(':product_name', $this->product_name);
    $result->bindParam(':product_price', $this->product_price);
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
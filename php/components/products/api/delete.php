<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../../db_connect.php';
  include_once '../products.php';

  $products = new Products();

  //Get raw posted data 

  $data = json_decode(file_get_contents("php://input"));
  if(isset($data->product_id)){
  $products->product_id = $data->product_id;
  }

  if($products->delete_product()) {
    echo json_encode(
      array('message' => 'Product Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'Product Not Deleted')
    );
  }
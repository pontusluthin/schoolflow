<?php 

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../../db_connect.php';
  include_once '../products.php';

  $products = new Products();

  //Get raw posted data 

  $data = json_decode(file_get_contents("php://input"));

  $products->product_name = $data->product_name;
  $products->product_price = $data->product_price;
  $products->description = $data->description; 

  if($products->create_product()) {
    echo json_encode(
      array('message' => 'Product Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Product Not Created')
    );
  }
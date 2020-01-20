<?php 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


    $products = new Products();

    //Get raw posted data 

    $data = json_decode(file_get_contents("php://input"));

    $products->name = $data->name;
    $products->type = $data->type;
    $products->month_price = $data->month_price;
    $products->year_price = $data->year_price;
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

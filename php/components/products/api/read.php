<?php 


  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  $products = new Products();
  
  $result = $products->read();
  
  $num = $result->rowCount();
  
  if($num > 0) {
  
    $products_arr = array();
    $products_arr['data'] = array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
  
      $product_item = array(
        'product_id'      =>  $product_id,
        'name'            =>  $name,
        'type'            =>  $type,
        'month_price'   =>  $month_price,
        'year_price'   =>  $year_price,
        'description'     =>  $description   
      );
  
      array_push($products_arr['data'], $product_item);
    }
  
    //Ändra till JSON
  
    echo json_encode($products_arr);
  
  } else {
  
    //Ingen data 
    
    echo json_encode(
      array('message' => 'No data found')
    );
  
  }


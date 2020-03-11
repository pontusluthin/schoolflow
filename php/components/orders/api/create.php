<?php 

  // Create a order

  header( 'Access-Control-Allow-Origin: *' );
  header( 'Content-Type: application/json' );
  header( 'Access-Control-Allow-Methods: POST' );
  header( 'Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With' );

  $order = new Order();

  //Get raw posted data 
  $data = json_decode(file_get_contents( "php://input" ));

  $order->order_id      = $data->order_id;
  $order->customer_id   = $data->customer_id;
  $order->product_id    = $data->product_id;

  if( $order->create_order() ) {
    echo json_encode(
      array( 'message' => 'Order Created' )
    );
  } else {
    echo json_encode(
      array( 'message' => 'Order Not Created' )
    );
  }

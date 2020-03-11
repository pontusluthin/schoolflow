<?php 

//Order API

  header( 'Access-Control-Allow-Origin: *' );
  header( 'Content-Type: application/json' );
  header( 'Access-Control-Allow-Methods: POST' );
  header( 'Access-Control-Allow-Methods: PUT' );
  header( 'Access-Control-Allow-Methods: DELETE' );
  header( 'Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With' );

  include_once( 'php/db_connect.php' );
  include_once( 'php/components/orders/orders.php' );

  $method = $_SERVER[ 'REQUEST_METHOD' ];
  switch ( $method ) {
    case 'GET':
      $data = $_GET;

      if ( isset ( $data [ 'customer_id' ] ) ) {
      }
      else {
      }
      break;
    case 'POST':
      require_once( 'php/components/orders/api/create.php' );
      break;
    case 'DELETE':
      break;
    case 'PUT':
      break;
  }
    
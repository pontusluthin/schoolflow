<?php

  //Product API

  header( 'Access-Control-Allow-Origin: *' );
  header( 'Content-Type: application/json' );
  header( 'Access-Control-Allow-Methods: POST' );
  header( 'Access-Control-Allow-Methods: PUT' );
  header( 'Access-Control-Allow-Methods: DELETE' );
  header( 'Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With' );

  include_once( 'php/db_connect.php' );
  include_once( 'php/components/products/products.php' );

  $method = $_SERVER[ 'REQUEST_METHOD' ];
  switch ( $method ) {
    case 'GET':
      $data = $_GET;

      if ( isset( $data [ 'product_id' ] ) ) {
        require_once( 'php/components/products/api/read_single.php' );
      }
      else {
        require_once( 'php/components/products/api/read.php' );
      }
      break;
    case 'POST':
      require_once( 'php/components/products/api/create.php' );
      break;
    case 'DELETE':
      require_once( 'php/components/products/api/delete.php' );
      break;
    case 'PUT':
      require_once( 'php/components/products/api/update.php' );
      break;
  }
    
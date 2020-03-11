<?php 

  //Customer API

  header( 'Access-Control-Allow-Methods: POST' );
  header( 'Access-Control-Allow-Methods: DELETE' );

  include_once( 'php/db_connect.php' );
  include_once( 'php/components/login/user.php' );
  include_once( 'php/components/customer/customer.php' );

  $method = $_SERVER[ 'REQUEST_METHOD' ];
  switch ( $method ) {
    case 'GET':
      $data = $_GET;
    
      if ( isset ( $data [ 'email' ] ) ) {
        require_once( 'php/components/customer/api/read_single.php' );
      }
      else {
      }
      break;
    case 'POST':
      require_once( 'php/components/login/api/create_user.php' );
      break;
    case 'DELETE':
    
      break;
    case 'PUT':
      require_once( 'php/components/customer/api/update_customer_email.php' );
      break;
  }
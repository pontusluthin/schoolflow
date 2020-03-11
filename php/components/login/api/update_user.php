<?php

  //User update

  // required headers
  header("Access-Control-Allow-Origin: http://localhost/Examensarbete/schoolflow/customer");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  $user = new Users();

  include_once 'php/components/login/api/config/core.php';
  include_once 'vendor/firebase/php-jwt/src/BeforeValidException.php';
  include_once 'vendor/firebase/php-jwt/src/ExpiredException.php';
  include_once 'vendor/firebase/php-jwt/src/SignatureInvalidException.php';
  include_once 'vendor/firebase/php-jwt/src/JWT.php';
  use \Firebase\JWT\JWT;

  // get posted data
  $data = json_decode( file_get_contents( "php://input" ) );

  // get jwt
  $jwt = isset( $data->jwt ) ? $data->jwt : "";

  // if jwt is not empty
  if( $jwt ){

    // if decode succeed, show user details
    try {

          // decode jwt
          $decoded = JWT::decode( $jwt, $key, array('HS256') );
      
          // set user property values
        $user->first_name         = $data     ->first_name;
        $user->last_name          = $data     ->last_name;
        $user->customer_address   = $data     ->customer_address;
        $user->postal_code        = $data     ->postal_code; 
        $user->city               = $data     ->city;
        $user->email              = $data     ->email;
        $user->phone              = $data     ->phone;
        $user->customer_password  = $data     ->customer_password;
        $user->customer_id        = $decoded  ->data->customer_id;

    // update the user record
      if( $user->update() ) {

        // we need to re-generate jwt because user details might be different
      $token = array(
        "iss" => $iss,
        "aud" => $aud,
        "iat" => $iat,
        "nbf" => $nbf,
        "data" => array(
          "customer_id"       => $user->customer_id,
          "first_name"        => $user->first_name,
          "last_name"         => $user->last_name,
          "customer_address"  => $user->customer_address,
          "postal_code"       => $user->postal_code,
          "city"              => $user->city,
          "phone"             => $user->phone,
          "email"             => $user->email
        )
      );

      $jwt = JWT::encode( $token, $key );

      // set response code
      http_response_code(200);

      // response in json format
      echo json_encode(
            array(
                "message" => "User was updated.",
                "jwt" => $jwt
            )
        );
      }

      // message if unable to update user
      else {

        // set response code
        http_response_code(401);

        // show error message
        echo json_encode(array( "message" => "Unable to update user." ));
      }

    }// if decode fails, it means jwt is invalid
    catch ( Exception $e ) {

      // set response code
      http_response_code(401);

      // show error message
      echo json_encode(array(
        "message" => "Access denied.",
        "error" => $e->getMessage()
      ));
    }
  }// show error message if jwt is empty
  else{

    // set response code
    http_response_code(401);

    // tell the user access denied
    echo json_encode(array( "message" => "Access denied." ));
  }


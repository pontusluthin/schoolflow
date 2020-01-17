<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$user = new Users();

// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$user->email = $data->email;
$email_exists = $user->emailExists();

 
// database connection will be here

include_once 'php/components/login/api/config/core.php';
include_once 'vendor/firebase/php-jwt/src/BeforeValidException.php';
include_once 'vendor/firebase/php-jwt/src/ExpiredException.php';
include_once 'vendor/firebase/php-jwt/src/SignatureInvalidException.php';
include_once 'vendor/firebase/php-jwt/src/JWT.php';
use \Firebase\JWT\JWT;

// check if email exists and if password is correct
if($email_exists && password_verify($data->customer_password, $user->customer_password)){
 
  $token = array(
     "iss" => $iss,
     "aud" => $aud,
     "iat" => $iat,
     "nbf" => $nbf,
     "data" => array(
         "customer_id" => $user->customer_id,
         "first_name" => $user->first_name,
         "last_name" => $user->last_name,
         "customer_address" => $user->customer_address,
         "postal_code" => $user->postal_code,
         "city" => $user->city,
         "phone"=> $user->phone,
         "email" => $user->email
     )
  );

  // set response code
  http_response_code(200);

  // generate jwt
  $jwt = JWT::encode($token, $key);
  echo json_encode(
          array(
              "message" => "Successful login.",
              "jwt" => $jwt
          )
      );

}else{
 
  // set response code
  http_response_code(401);

  // tell the user login failed
  echo json_encode(array("message" => "Login failed."));
}
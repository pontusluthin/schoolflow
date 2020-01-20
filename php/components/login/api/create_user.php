<?php

// required headers


$user = new Users();

$data = json_decode(file_get_contents("php://input"));

$user->customer_id = $data->customer_id;
$user->first_name = $data->first_name;
$user->last_name = $data->last_name;
$user->customer_address = $data->customer_address;
$user->postal_code = $data->postal_code; 
$user->city = $data->city;
$user->email = $data->email;
$user->phone = $data->phone;
$user->customer_password = $data->customer_password;

if(
  !empty($user->customer_id) &&
  !empty($user->first_name) &&
  !empty($user->last_name) &&
  !empty($user->customer_address) &&
  !empty($user->postal_code) &&
  !empty($user->city) &&
  !empty($user->email) &&
  !empty($user->customer_password) &&
  $user->create()
){

  // set response code
  http_response_code(200);

  // display message: user was created
  echo json_encode(array("message" => "User was created."));
}

// message if unable to create user
else{

  // set response code
  http_response_code(400);

  // display message: unable to create user
  echo json_encode(array("message" => "Unable to create user."));
}
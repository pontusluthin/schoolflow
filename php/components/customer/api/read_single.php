<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$customer = new Customer();

$customer->email = isset($_GET['email']) ? $_GET['email'] : die;

$customer->read_single_customer();

$customer_arr = array(
  'order_id' => $customer->order_id, 
  'first_name' => $customer->first_name,
  'last_name' => $customer->last_name,
  'customer_address' => $customer->customer_address,
  'postal_code' => $customer->postal_code,
  'city' => $customer->city,
  'email' => $customer->email,
  'phone' => $customer->phone,
  'name' => $customer->name,
  'month_price' => $customer->month_price,
  'date' => $customer->date

);

print_r(json_encode($customer_arr));
<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$products = new Products();

$products->product_id = isset($_GET['product_id']) ? $_GET['product_id'] : die;

$products->read_single_product();

$product_arr = array(
  'product_id' => $products->product_id, 
  'product_name' => $products->product_name,
  'product_price' => $products->product_price,
  'description' => $products->description
);

print_r(json_encode($product_arr));
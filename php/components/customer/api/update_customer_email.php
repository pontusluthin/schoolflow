<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


 $customer = new Customer();

 //Get raw posted data 

 $data = json_decode(file_get_contents("php://input"));

 $customer->customer_id = $data->customer_id;
 $customer->email= $data->email;


 if($customer->update_customer_email()) {
   echo json_encode(
     array('message' => 'Email Updated')
   );
 } else {
   echo json_encode(
     array('message' => 'Email Not Updated')
   );
 }
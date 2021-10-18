<?php require_once 'config.php';

try {
  // customer_id is valid of it is present, is an integer with a minimum value of 1
  $rules = [
    'customer_id' => 'present|integer|min:1'
  ];

  // you can have a look at the validate() function in HttpRequest.php (line 415)
  $request->validate($rules);
  if (!$request->is_valid()) {
    throw new Exception("Illegal request");
  }
  //the customer_id was passed in from customer-index.php
  // now you extract it from the request object and assign the value to the variable $customer_id  
  $customer_id = $request->input('customer_id');


  /*Retrieving the correct customer object ($customer) from the Database*/
  //Call findById(id) function to check if this customer exists in the Database
  $customer = customer::findById($customer_id);
  // if customer does not exist display error message 
  if ($customer === null) {
    throw new Exception("No customer exists or Illegal request parameter");
  }

  // $customer is an object - created from the customer class
  // calling $customer->delete() calls the delete function in the customer class
  $customer->delete();

  // Display redirect to the list of customers and display the correct message - Deleted or Not Deleted
  $request->session()->set("flash_message", "The customer was successfully deleted from the database");
  $request->session()->set("flash_message_class", "alert-info");
  $request->redirect("/customer-index.php");
} catch (Exception $ex) {
  /*If something goes wrong, catch the message and store it as a flash message.*/
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->redirect("/customer-index.php");
}
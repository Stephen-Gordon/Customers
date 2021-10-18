<?php
require_once 'config.php';

try {
    // $request = new HttpRequest();

    $locations = [
        "USA",  "Belgium", "Brazil", "UK",
        "Hungary", "Morocco", "Spain",
        "Germany", "Japan", "Netherlands",
        "Canada", "Croatia", "Philippines"
    ];

    $rules = [
        "customer_id" => "present|integer|min:1",
        "name" => "present|minlength:2|maxlength:64",
        "address" => "present|minlength:4|maxlength:255",
        "email" => "present|email|minlength:7|maxlength:255",
        "phone" => "present|minlength:2|maxlength:64"
    ];

    $request->validate($rules);
    if ($request->is_valid()) {
        $image = null;
        if (FileUpload::exists('profile')) {
            //If a file was uploded for profile,
            //create a FileUpload object
            $file = new FileUpload("profile");
            $filename = $file->get();
            //Create a new image object and save it.
            $image = new Image();
            $image->filename = $filename;

            // you must implement save() function in the Image.php class
            $image->save();
        }
        $customer = customer::findById($request->input("customer_id"));
        $customer->name = $request->input("name");
        $customer->address = $request->input("address");
        $customer->email = $request->input("email");
        $customer->phone = $request->input("phone");
        /*If not null, the user must have uploaded an image, so reset the image id to that of the one we've just uploaded.*/
        if ($image !== null) {
            $customer->image_id = $image->id;
        }

        // you must implement the save() function in the customer class
        $customer->save();

        $request->session()->set("flash_message", "The customer was successfully updated in the database");
        $request->session()->set("flash_message_class", "alert-info");
        /*Forget any data that's already been stored in the session.*/
        $request->session()->forget("flash_data");
        $request->session()->forget("flash_errors");

        $request->redirect("/customer-index.php");
    } else {
        $customer_id = $request->input("customer_id");
        /*Get all session data from the form and store under the key 'flash_data'.*/
        $request->session()->set("flash_data", $request->all());
        /*Do the same for errors.*/
        $request->session()->set("flash_errors", $request->errors());

        $request->redirect("/customer-edit.php?customer_id=" . $customer_id);
    }
} catch (Exception $ex) {
    //redirect to the create page...
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");
    $request->session()->set("flash_data", $request->all());
    $request->session()->set("flash_errors", $request->errors());

    // not yet implemented
    $request->redirect("/customer-create.php");
}

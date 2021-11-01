<?php
require_once 'config.php';

try {
    

    $rules = [
        "customer_id" => "present|integer|min:1",
        "name" => "present|minlength:2|maxlength:64",
        "address" => "present|minlength:4|maxlength:255",
        "email" => "present|minlength:7|maxlength:255",
        "phone" => "present"
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

        // !!Check .... If your Image is saved to the Database, but your 'Festival' has not, you know code is correct to at least this point ...

        // Create an empty $festival object
        $customer = new Customer();

        // festival-create.php passed title, description, location etc... in it's request object
        // not get title, description, location etc from the request object and assign these values to the appropriate attributes in the $festival object. 
        
        $customer->name = $request->input("name");
        $customer->address = $request->input("address");
        $customer->email = $request->input("email");
        $customer->phone = $request->input("phone");

        // When the Image was saved to the database ($image->save() above) and ID was created for that image. 
        // Now get that id from the $image, and assign it to $festival->image_id so it can be saved as in the festival table as a foreign key. 
        $customer->image_id = $image->id;
        
        // save() is a function in the Festival class, you will have written part of it - to update an existing festival
        // now you will add more code to the save() function so it can create a new festival or update an existing festival.  
        $customer->save();


        $request->session()->set("flash_message", "The festival was successfully added to the database");
        //Class that changes the appearance of the Bootstrap message.
        $request->session()->set("flash_message_class", "alert-info");
        $request->session()->forget("flash_data");
        $request->session()->forget("flash_errors");
        // redirect back to the home page - festival-index.php
        $request->redirect("/customer-index.php");
    } else {
        //Get all session data from the form and store under the key 'flash_data'.
        $request->session()->set("flash_data", $request->all());
        $request->session()->set("flash_errors", $request->errors());

        //Redirect the user to the create page.
        $request->redirect("/customer-create.php");
    }
} catch (Exception $ex) {
    /*Get all data and errors again and redirect.*/
    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");
    $request->session()->set("flash_data", $request->all());
    $request->session()->set("flash_errors", $request->errors());
    $request->redirect("/customer-create.php");
}

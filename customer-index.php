<?php require_once 'config.php'; 

// We don't have a login yet so I have this commented out.
// if (!$request->is_logged_in()) {
//   $request->redirect("/login-form.php");
// }
?>
<?php
try {
    // You will learn more about sessions later
    $request->session()->forget("flash_data");
    $request->session()->forget("flash_errors");

    // Call the findAll() function in classes/customer.php
    // This function returns an array $customers[] which is retrieved from the database
    $customers = customer::findAll();
}
// If there were any exceptions thrown in the above try block they will be caught here and put into the session data.
catch (Exception $ex){
    $request->session()->set("flash_message", $ex->getMessage());
     $request->session()->set("flash_message_class", "alert-warning");
    $customers = [];
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>customer Index</title>

    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
      
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
      
    <link rel="stylesheet" type="text/css" href="assets/css/myStyle.css">
  </head>
  <body>
   
      <?php require 'include/navbar.php'; ?>
      <?php require "include/flash.php"; ?>
      
    <div class="container-fluid">
      <main role="main">

        <div class="row">
            <div class="col table-responsive">
            <h1>customers
                 <!-- The add button will call customers-create.php, the create will be implemented at a later stage -->
                 <a class="btn button float-right" href="<?= APP_URL ?>/customer-create.php">Add</a>
                </h1>
                <form method="get">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>address</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <!-- Loop through the following for every item in the $customers[] array, display title, description, location etc. to the screen -->
                  <?php foreach ($customers as $customer) { ?>
                    <tr>
                      <!-- a radio button will display for each customer, the user can choose one customer then choose the View button below -->
                      <td><input type="radio" name="customer_id" value="<?= $customer->id ?>" /> </td>
                      <td><?= $customer->id ?></td>
                      <td><?= $customer->name ?></td>
                      <td><?= $customer->address ?></td>
                      <td><?= $customer->email ?></td>
                      <td><?= $customer->phone ?></td>
                        <td>
                        <?php
                            // We have the image_id for the customer, now call findById(image_id) in the class Image.php
                            // Image:: findById($image_id) will go to the database to get the image filename from the Image table 
                            $image = Image::findById($customer->image_id);
                            if ($image !== null){
                                ?>
                                <img src="<?= APP_URL . "/" . $image->filename ?>" width="50px" alt="image" />
                        <?php
                            }
                            ?>
                        </td>                
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
                <!-- View, Edit and Delete buttons link to the appropriate php file. In this version you will implement customer-view.php -->
                <button class="btn button btn-customer" formaction="<?= APP_URL ?>/customer-view.php">View</button>
                <button class="btn button btn-customer" formaction="<?= APP_URL ?>/customer-edit.php">Edit</button>
                <button class="btn button btn-customer btn-customer-delete" formaction="<?= APP_URL ?>/customer-delete.php">Delete</button>
                </form>
            </div>
          </div>
      </main>
    </div>
      
   <?php require 'include/footer.php'; ?>
      
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/customer.js"></script>
  </body>
</html>

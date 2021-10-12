<?php require_once 'config.php';

try {

  // The $rules array has 3 rules, customer_id must be present, must be an integer and have a minimum value of 1.  
  // note customer_id was passed in from customer_index.php when you chose a customer by clicking a radio button. 
  $rules = [
    'customer_id' => 'present|integer|min:1'
  ];
  // $request->validate() is a function in HttpRequest(). You pass in the 3 rules above and it does it's magic. 
  $request->validate($rules);
  if (!$request->is_valid()) {
    throw new Exception("Illegal request");
  }

  // get the customer_id out of the request (remember it was passed in from customer_index.php)
  $customer_id = $request->input('customer_id');
 
  //Retrieve the customer object from the database by calling findById($customer_id) in the customer.php class
  $customer = customer::findById($customer_id);
  if ($customer === null) {
    throw new Exception("Illegal request parameter");
  }
} catch (Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  // some exception/error occured so re-direct to the home page
  $request->redirect("/customer-index.php");
}

?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Customer</title>

  <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
  <link href="<?= APP_URL ?>/assets/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">


</head>

<body>
  <div class="container-fluid p-0">
    <?php require 'include/navbar.php'; ?>
    <main role="main">
      <div>
        <div class="row d-flex justify-content-center">
          <h1 class="t-peta engie-head pt-5 pb-5">View customer</h1>
        </div>

        <div class="row justify-content-center pt-4">
          <div class="col-lg-10">
            <form method="get">
              <!--This is how we pass the ID-->
              <input type="hidden" name="customer_id" value="<?= $customer->id ?>" />

              <!--Disabled so the user can't intereact. This form is for viewing only.-->
              <div class="form-group">
                <label class="labelHidden" for="ticketPrice">Name</label>
                <input placeholder="Name" type="text" id="Name" class="form-control" value="<?= $customer->Name ?>" disabled />
              </div>

              <div class="form-group">
                <label class="labelHidden" for="date">Address</label>
                <textarea name="address" rows="3" id="address" class="form-control" disabled><?= $customer->address ?></textarea>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="location">Phone</label>
                <select class="form-control" name="phone" id="phone" disabled>
                  <!-- triple === means if it is equal. So is location is equal to "USA" display USA, if location is equal to "Belgium" display ...you get the idea..-->
                  <option value="USA" <?= (($customer->location === "USA") ? "selected" : "") ?>>USA</option>
                  <option value="Belgium" <?= (($customer->location === "Belgium") ? "selected" : "") ?>>Belgium</option>>
                  <option value="Brazil" <?= (($customer->location === "Brazil") ? "selected" : "") ?>>Brazil</option>
                  <option value="UK" <?= (($customer->location === "UK") ? "selected" : "") ?>>UK</option>
                  <option value="Germany" <?= (($customer->location === "Germany") ? "selected" : "") ?>>Germany</option>
                  <option value="Japan" <?= (($customer->location === "Japan") ? "selected" : "") ?>>Japan</option>
                  <option value="Netherlands" <?= (($customer->location === "Netherlands") ? "selected" : "") ?>>Netherlands</option>
                  <option value="Hungary" <?= (($customer->location === "Hungary") ? "selected" : "") ?>>Hungary</option>
                  <option value="Morocco" <?= (($customer->location === "Morocco") ? "selected" : "") ?>>Morocco</option>
                  <option value="Spain" <?= (($customer->location === "Spain") ? "selected" : "") ?>>Spain</option>
                  <option value="Canada" <?= (($customer->location === "Canada") ? "selected" : "") ?>>Canada</option>
                  <option value="Croatia" <?= (($customer->location === "Croatia") ? "selected" : "") ?>>Croatia</option>
                  <option value="Philippines" <?= (($customer->location === "Philippines") ? "selected" : "") ?>>Philippines</option>
                </select>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="venueCapacity">Email</label>
                <input placeholder="email" type="email" class="form-control" id="email" value="<?= $customer->email ?>" disabled />
              </div>
              <div class="form-group">
                <label class="labelHidden" for="venueDescription">Image</label>
                <?php
                try {
                  $image = Image::findById($customer->image_id);
                } catch (Exception $e) {
                }
                if ($image !== null) {
                ?>
                  <img src="<?= APP_URL . "/" . $image->filename ?>" width="205px" alt="image" class="mt-2 mb-2" />
                <?php
                }
                ?>
              </div>

              <div class="form-group">
                <a class="btn btn-default" href="<?= APP_URL ?>/home.php">Cancel</a>
                <button class="btn btn-warning" formaction="<?= APP_URL ?>/customer-edit.php">Edit</button>
                <button class="btn btn-danger btn-customer-delete" formaction="<?= APP_URL ?>/customer-delete.php">Delete</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    <?php require 'include/footer.php'; ?>
  </div>
  <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
  <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= APP_URL ?>/assets/js/customer.js"></script>

  <script src="https://kit.fontawesome.com/fca6ae4c3f.js" crossorigin="anonymous"></script>

</body>

</html>
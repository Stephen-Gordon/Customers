<?php require_once 'config.php';

try {
  $rules = [
    'customer_id' => 'present|integer|min:1'
  ];
  $request->validate($rules);
  if (!$request->is_valid()) {
    throw new Exception("Illegal request");
  }
  $customer_id = $request->input('customer_id');
  /*Retrieving a customer object*/
  $customer = customer::findById($customer_id);
  if ($customer === null) {
    throw new Exception("Illegal request parameter");
  }
} catch (Exception $ex) {
  $request->session()->set("flash_message", $ex->getMessage());
  $request->session()->set("flash_message_class", "alert-warning");

  $request->redirect("/customer-index.php");
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit customer</title>

  <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
  <link href="<?= APP_URL ?>/assets/css/style.css" rel="stylesheet">
  <link href="<?= APP_URL ?>/assets/css/form.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">


</head>

<body>
  <div class="container-fluid p-0">
    <?php require 'include/navbar.php'; ?>
    <main role="main">
      <div>
        <div class="row d-flex justify-content-center">
          <h1 class="t-peta engie-head pt-5 pb-5">Edit customer</h1>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <?php require "include/flash.php"; ?>
          </div>
        </div>

        <div class="row justify-content-center pt-4">
          <div class="col-lg-10">
            <form method="post" action="<?= APP_URL ?>/customer-update.php" enctype="multipart/form-data">

              <!--This is how we pass the ID-->
              <input type="hidden" name="customer_id" value="<?= $customer->id ?>" />


              <div class="form-group">
                <label class="labelHidden" for="name">Name</label>
                <input placeholder="name" name="name" type="text" id="name" class="form-control" value="<?= old('name', $customer->name) ?>" />
                <span class="error"><?= error("title") ?></span>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="address">Address</label>
                <input placeholder="address" name="address" type="text" id="address" class="form-control" value="<?= old('address', $customer->address) ?>" />
                <span class="error"><?= error("address") ?></span>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="email">Contact Email</label>
                <input placeholder="Contact Email" type="email" name="email" id="email" class="form-control" value="<?= old("email", $customer->email) ?>" />
                <span class="error"><?= error("email") ?></span>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="phone">Contact Phone</label>
                <input placeholder="Contact Phone" type="text" name="phone" id="Phone" class="form-control" value="<?= old("phone", $customer->phone) ?>" />
                <span class="error"><?= error("phone") ?></span>
              </div>


              <div class="form-group">
                <label>Profile image:</label>
                <?php
                $image = Image::findById($customer->image_id);
                if ($image != null) {
                ?>
                  <img src="<?= APP_URL . "/" . $image->filename ?>" width="150px" />
                <?php
                }
                ?>
                <input type="file" name="profile" id="profile" />
                <span class="error"><?= error("profile") ?></span>
              </div>

              <div class="form-group">
                <a class="btn btn-default" href="<?= APP_URL ?>/customer-index.php">Cancel</a>
                <button type="submit" class="btn btn-primary">Store</button>
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
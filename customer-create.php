<?php require_once 'config.php';
?>

<!--Compare this to festival-edit.php & festival-view.php -->
<!-- The Form code is similar, but this time we simply display the empty form for a festival 
 In edit & view we do validation and get the festival first before then displaying the form with the festival details. -->

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Create Festival</title>

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
          <h1 class="t-peta engie-head pt-5 pb-5">Create Customer</h1>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <?php require "include/flash.php"; ?>
          </div>
        </div>

        <div class="row justify-content-center pt-4">
          <div class="col-lg-10">
            <!--Enctype - How the form should be encoded. 
            It tells the web server to send this off as a multipart request. 
            We are telling the browser we want to attach a file to the request body.-->
            <form method="post" action="<?= APP_URL ?>/customer-store.php" enctype="multipart/form-data">
              <!--This is how we pass the ID-->

              <input type="hidden" name="customer_id" value="<?= $customer->id ?>" />


              <div class="form-group">
                <label class="labelHidden" for="name">Name</label>
                <input placeholder="name" name="name" type="text" id="name" class="form-control" value="<?= old('name') ?>" />
                <span class="error"><?= error("name") ?></span>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="address">Address</label>
                <input placeholder="address" name="address" type="text" id="address" class="form-control" value="<?= old('address') ?>" />
                <span class="error"><?= error("address") ?></span>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="email">Contact Email</label>
                <input placeholder="Contact Email" type="email" name="email" id="email" class="form-control" value="<?= old("email") ?>" />
                <span class="error"><?= error("email") ?></span>
              </div>

              <div class="form-group">
                <label class="labelHidden" for="phone">Contact Phone</label>
                <input placeholder="Contact Phone" type="text" name="phone" id="phone" class="form-control" value="<?= old("phone") ?>" />
                <span class="error"><?= error("phone") ?></span>
              </div>


              <div class="form-group">
                <!--An uploaded file is moved into a temporary directory-->
                <label for="profile">Profile image:</label>
                <input type="file" name="profile" id="profile">
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
  <script src="<?= APP_URL ?>/assets/js/festival.js"></script>

  <script src="https://kit.fontawesome.com/fca6ae4c3f.js" crossorigin="anonymous"></script>

</body>

</html>
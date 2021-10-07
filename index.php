<!-- require_once explained : embed code from another file, in this case bring in config.php -->
<?php require_once 'config.php'; ?>
<?php 
// Explained : call the findAll() function, which is in the Festival class. 
// Explained : Store the list of festivals returned from findAll() in the variable $festivals
$customers = Customer::findAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customers</title>

    <!-- APP_URL is a constant defined in config.php, so open this file if you need to see it's value -->
    <link href="<?= APP_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>/assets/css/template.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php require 'include/header.php'; ?>
      <?php require 'include/navbar.php'; ?>
      <main role="main">
        <div>
          <h1>Customers</h1>
          <div class="row">
          <!-- $festivals is the list of festivals retrieved from the Database - see line 6 above
            Loop through $festivals and put each item into $festival then do whatever is between the { } --> 
          <?php foreach ($customers as $customer) { ?>
            <div class="col mb-4">
              <div class="card" style="width:15rem;">
                <?php
                  // Use the image ID in festival, go to the Image table and get the image file name which includes the file location 
                  $customer_image = Image::findById($customer->image_id);
                  if ($customer_image !== null) {
                  ?>
                    <!-- use the filename/location to display the correct image-->
                    <img src="<?= APP_URL . "/" . $customer_image->filename ?>" class="card-img-top" alt="...">
                  <?php
                  }
                  ?>
                <div class="card-body">
                  <h5 class="card-title"><?= $customer->title ?></h5>
                  <p class="card-text"><?= get_words($customer->description, 20) ?></p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Location: <?= $customer->name ?></li>
                  <li class="list-group-item">Start date: <?= $customer->address ?></li>
                  <li class="list-group-item">End date: <?= $customer->phone ?></li>
                </ul>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </main>
      <?php require 'include/footer.php'; ?>
    </div>
    <script src="<?= APP_URL ?>/assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= APP_URL ?>/assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

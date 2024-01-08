<?php
// call the connection.php file to connect the database
include 'connection.php';

// create a variable to hold the data from the form
$product_name = $_POST['product_name'];
$description = $_POST['description'];
$purchase_price = $_POST['purchase_price'];
$selling_price = $_POST['selling_price'];
$product_pictures = $_FILES['product_pictures']['name'];


//check if there is a product image run this code
if ($product_pictures != "") {
  $extension_allowed = array('png', 'jpg');
  $x = explode('.', $product_pictures);
  $extension = strtolower(end($x));
  $file_tmp = $_FILES['product_pictures']['tmp_name'];
  $random_number = rand(1, 999);
  $new_image_name = $random_number . '-' . $product_pictures;
  if (in_array($extension, $extension_allowed) === true) {
    move_uploaded_file($file_tmp, 'picture/' . $new_image_name);
    // run an INSERT query to add data to the database make sure it's in order (no need for id because it's generated automatically)
    $query = "INSERT INTO product (product_name, description, purchase_price, selling_price, product_pictures) VALUES ('$product_name', '$description', '$purchase_price', '$selling_price', '$new_image_name')";
    $result = mysqli_query($connection, $query);
    // check the query for errors
    if (!$result) {
      die("Query failed to run: " . mysqli_errno($connection) .
        " - " . mysqli_error($connection));
    } else {
      //show alert and will redirect to page index.php
      //please change index.php according to the page you want to go to
      echo "<script>alert('Data added successfully.');window.location='index.php';</script>";
    }

  } else {
    //if the file extension is not jpg and png then this alert will appear
    echo "<script>alert('Image extension that can only be jpg or png.');window.location='add_product.php';</script>";
  }
} else {
  $query = "INSERT INTO product (product_name, description, purchase_price, selling_price, product_pictures) VALUES ('$product_name', '$description', '$purchase_price', '$selling_price', null)";
  $result = mysqli_query($connection, $query);
  // check the query for errors
  if (!$result) {
    die("Query failed to run: " . mysqli_errno($connection) .
      " - " . mysqli_error($connection));
  } else {
    //show alert and will redirect to page index.php
    //please change index.php according to the page you want to go to
    echo "<script>alert('Data added successfully.');window.location='index.php';</script>";
  }
}



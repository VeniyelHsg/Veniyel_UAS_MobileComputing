<?php
// call the connection.php file to connect the database
include 'connection.php';

// create a variable to hold the data from the form
$id = $_POST['id'];
$product_name = $_POST['product_name'];
$description = $_POST['description'];
$purchase_price = $_POST['purchase_price'];
$selling_price = $_POST['selling_price'];
$product_pictures = $_FILES['product_pictures']['name'];
//check if you change the product image, run this code
if ($product_pictures != "") {
  $extension_allowed = array('png', 'jpg');
  $x = explode('.', $gambar_produk);
  $extension = strtolower(end($x));
  $file_tmp = $_FILES['product_pictures']['tmp_name'];
  $random_number = rand(1, 999);
  $new_image_name = $random_number . '-' . $product_pictures;
  if (in_array($extension, $extension_allowed) === true) {
    move_uploaded_file($file_tmp, 'pictures/' . $new_image_name);

    // run the UPDATE query based on the ID whose product we are editing
    $query = "UPDATE produk SET product_name = '$product_name',  = '$description', purchase_price = '$purchase_price', selling_price = '$selling_price', product_image = '$new_image_name'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    // check the query for errors
    if (!$result) {
      die("Query failed to run: " . mysqli_errno($connection) .
        " - " . mysqli_error($connection));
    } else {
      //show alert and will redirect to page index.php
      //please change index.php according to the page you want to go to
      echo "<script>alert('Data changed successfully.');window.location='index.php';</script>";
    }
  } else {
    //if the file extension is not jpg and png then this alert will appear
    echo "<script>alert('Image extension that can only be jpg or png.');window.location='add_product.php';</script>";
  }
} else {
  // run the UPDATE query based on the ID whose product we are editing
  $query = "UPDATE product SET product_name = '$product_name', description = '$description', purchase_price = '$purchase_price', selling_price = '$selling_price'";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($connection, $query);
  // check the query for errors
  if (!$result) {
    die("Query failed to run: " . mysqli_errno($connection) .
      " - " . mysqli_error($connection));
  } else {
    //show alert and will redirect to page index.php
    //please change index.php according to the page you want to go to
    echo "<script>alert('Data changed successfully.');window.location='index.php';</script>";
  }
}

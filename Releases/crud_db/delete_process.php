<?php
include 'connection.php';
$id = $_GET["id"];


//run a DELETE query to delete data
$query = "DELETE FROM produk WHERE id='$id' ";
$hasil_query = mysqli_query($connection, $query);

//check the query, is there any error
if (!$results_query) {
  die("Failed to delete data: " . mysqli_errno($connection) .
    " - " . mysqli_error($connection));
} else {
  echo "<script>alert('Data deleted successfully.');window.location='index.php';</script>";
}
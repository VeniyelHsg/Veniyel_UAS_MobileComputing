<?php
include 'connection.php';

if (isset($_GET['id'])) {
  $id = $_GET["id"];

  $query = "SELECT * FROM product WHERE id='$id'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
  }

  $data = mysqli_fetch_assoc($result);

  if (!$data) {
    echo "<script>alert('No data found in the database');window.location='index.php';</script>";
  }
} else {
  echo "<script>alert('Enter ID data.');window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>CRUD Products with pictures - Database System</title>
  <style type="text/css">
    * {
      font-family: "Verdana";
    }

    h1 {
      text-transform: uppercase;
      color: DeepSkyBlue;
    }

    button {
      background-color: LightSkyBlue;
      color: #000000;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
      border: 0px;
      margin-top: 20px;
    }

    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }

    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #F5F5DC;
      outline-color: WhiteSmoke;
    }

    div {
      width: 100%;
      height: auto;
    }

    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #FFFAF0;
    }
  </style>
</head>

<body>
  <center>
    <h1>Product Edit
      <?php echo $data['product_name']; ?>
    </h1>
  </center>
  <form method="POST" action="process_edit.php" enctype="multipart/form-data">
    <section class="base">
      <input name="id" value="<?php echo $data['id']; ?>" hidden />
      <div>
        <label>Product Name</label>
        <input type="text" name="product_name" value="<?php echo $data['product_name']; ?>" autofocus="" required="" />
      </div>
      <div>
        <label>Description</label>
        <input type="text" name="description" value="<?php echo $data['description']; ?>" />
      </div>
      <div>
        <label>Purchase Price</label>
        <input type="text" name="purchase_price" required="" value="<?php echo $data['purchase_price']; ?>" />
      </div>
      <div>
        <label>Selling Price</label>
        <input type="text" name="selling_price" required="" value="<?php echo $data['selling_price']; ?>" />
      </div>
      <div>
        <label>Product Pictures</label>
        <img src="picture/<?php echo $data['product_picture']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
        <input type="file" name="product_pictures" />
        <i style="float: left;font-size: 11px;color:red">Ignore if you don't change the product image</i>
      </div>
      <div>
        <button type="submit">Save Changes</button>
      </div>
    </section>
  </form>
</body>

</html>
<?php
include('connection.php'); // so that the index is connected to the database, the connection as a liaison must be included 

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
      background: #FFFFFF;
      border: 2px solid Beige;
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
    <h1>Add Product</h1>
    <center>
      <form method="POST" action="add_process.php" enctype="multipart/form-data">
        <section class="base">
          <div>
            <label>Product Name</label>
            <input type="text" name="product_name" autofocus="" required="" />
          </div>
          <div>
            <label>Description</label>
            <input type="text" name="description" />
          </div>
          <div>
            <label>Purchase Price</label>
            <input type="text" name="purchase_price" required="" />
          </div>
          <div>
            <label>Selling Price</label>
            <input type="text" name="selling_price" required="" />
          </div>
          <div>
            <label>Product Pictures</label>
            <input type="file" name="product_pictures" required="" />
          </div>
          <div>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit">Save Product ✅</button>
          </div>
        </section>
      </form>
</body>

</html>
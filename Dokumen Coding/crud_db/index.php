<?php
include('connection.php');

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

    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }

    table thead th {
      background-color: #FFF8DC;
      border: solid 1px #DDEEEE;
      color: #000000;
      padding: 10px;
      text-align: center;
      text-shadow: 1px 1px 1px;
      text-decoration: none;
    }

    table tbody td {
      border: solid 1px #DDEEEE;
      color: #333;
      padding: 10px;
      text-shadow: 1px 1px 1px #ffffe0;
    }

    a {
      background-color: LightSkyBlue;
      color: #000000;
      padding: 1px;
      text-decoration: none;
      font-size: 11px;
    }
  </style>
</head>

<body>
  <center>
    <h1>Product Data</h1>
    <a href="add_product.php">+ &nbsp; Add Product</a>
    <br />
    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th>Product</th>
          <th>Description</th>
          <th>Purchase Price</th>
          <th>Selling Price</th>
          <th>Picture</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM product ORDER BY id ASC";
        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
        }

        $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td>
              <?php echo $no; ?>
            </td>
            <td>
              <?php echo $row['product_name']; ?>
            </td>
            <td>
              <?php echo substr($row['description'], 0, 20); ?>...
            </td>
            <td>Rp
              <?php echo number_format($row['purchase_price'], 0, ',', '.'); ?>
            </td>
            <td>Rp
              <?php echo number_format($row['selling_price'], 0, ',', '.'); ?>
            </td>
            <td style="text-align: center;"><img src="picture/<?php echo $row['product_picture']; ?>"
                style="width: 120px;"></td>
            <td>
              <a href="product_edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="delete_process.php?id=<?php echo $row['id']; ?>"
                onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
            </td>
          </tr>

          <?php
          $no++;
        }
        ?>
      </tbody>
    </table>
  </center>
</body>

</html>
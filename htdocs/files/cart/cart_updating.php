<?php
session_start();
require("..\..\configuration\configure.php");
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $id = $_GET['id'];
    if (isset($_SESSION['log_in'])) {
        $loged_in = $_SESSION['log_in'];
        $query = "INSERT INTO cart_table(customer_id,product_id)
                  values('$loged_in','$id');";
        $result = mysqli_query($sqli,$query);
        if ($result) {
          mysqli_close();
          header('Location:cart.php');
        }
        else {
          echo "<p>Can't Add in Cart Right Now. Database Error. Please Try after sometime.</p>";
        }
      }

    else {
      echo "<p style=\"color: red;\">Can't Add into Cart. Requires Sign In</p>";
    }
    mysqli_close();
     ?>
  </body>
</html>

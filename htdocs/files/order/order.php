<?php
session_start();
include_once("..\..\configuration\configure.php");
$pID = $_GET['id'];
$cusID = $_SESSION['log_in'];
$query = "INSERT INTO order_table(order_product,order_customer) VALUES
          ($pID,$cusID);";
$result = mysqli_query($sqli, $query);
mysqli_close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"><meta charset="utf-8">
    <link rel="stylesheet" href="..\..\css\footer.css">
    <link rel="stylesheet" href="..\..\css\Style.css">
    <link rel="stylesheet" href="..\..\css\header.css">
    <link rel="stylesheet" href="..\..\css\body.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Orders</title>
  </head>
  <body>
    <div class = "row">
      <h1 class= "col-m-12 col-s-12 col-2">Tech <span>Store.</span></h1>
      <a href="..\..\index.php" class="col-m-12 col-s-12 col-1 main_ifo">Home</a>
      <a href="..\ABOUT US.php" class="col-m-12 col-s-12 col-2 main_ifo">About</a>
      <a href="..\Contact.php" class="col-m-12 col-s-12 col-2 main_ifo">Contact Us</a>
      <a href="..\cart\cart.php" class="col-m-12 col-s-12 col-1 main_ifo">Cart</a>
    <?php
    if (isset($_SESSION["log_in"])) {
      $log_in = $_SESSION["log_in"];
       $query = "SELECT * FROM customer_table WHERE customer_id = $log_in;";
       $result = mysqli_query($sqli, $query);
      while ($res = mysqli_fetch_array($result)) {
      echo "<a href=\"..\..\log-in\log_out.php\" class=\"col-m-12 col-s-12 col-3 main_ifo\" onclick=\"confirm('You Want To Log Out.')\">".$res['customer_name']."</a>";
    }
    mysqli_close();
  }
     else {
         echo "<a href=\"..\..\log-in\customersignin.php\" class=\"col-m-12 col-s-12 col-3 main_ifo\">Sign In/Sign Up</a>";
      }
    ?>
    </div>
    <div class="row" id="search">
      <form class="" action="..\search.php" method="post">
      <input type="text" name="search" value="" placeholder="Search" class="col-m-12 col-s-9 col-9">
      <button type="submit" name="submit" class="col-m-12 col-s-3 col-3">Search</button>
      </form>
    </div>
    <hr>
    <div class="row">
      <table class= "col-m-12 col-m-4 col-12" style="text-align: center;">
        <?php
        if (isset($_SESSION['log_in'])) {
          $cID = $_SESSION['log_in'];
        echo "<tr>";
        echo "<th class= \"col-m-4 col-s-4 col-4\">Order ID</th>";
        echo "<th class= \"col-m-4 col-s-4 col-4\">Product Name</th>";
        echo "<th class= \"col-m-4 col-s-4 col-4\" colspan=\"2\">Placing Address</th>";
        echo "</tr>";
          $query = "SELECT * FROM order_table ot
          JOIN product_table pt on ot.order_product = pt.product_id
          JOIN customer_table ct on ot.order_customer = ct.customer_id WHERE customer_id = $cID;";
          $result = mysqli_query($sqli,$query);
          while ($res = mysqli_fetch_array($result)) {
            echo "<tr><td class= \"col-m-4 col-s-4 col-4 product\">".$res['order_id']."</td>";
            echo "<td class= \"col-m-4 col-s-4 col-4 product\">".$res['name']."</td>";
            echo "<td class= \"col-m-2 col-s-2 col-4\">".$res['customer_address']."</td></tr>";
          }
        }
        else {
          echo "<p>Please Log In First To See Your Orders.</p>";
        }
         ?>
    </table>
  </div>
  <footer class="change_footer">
    <div class="row contact">
      <div class="col-m-12 col-s-12 col-6 ">
        <h2>We're Always Ready To Help</h2>
        <p>Reach out to us through any of these support channels</p>
      </div>
      <div class="col-m-12 col-s-12 col-2 inner ">
        <a href="../Contact.php" class="inner" style="padding-left: 50px;"><i class="fa fa-whatsapp" style="font-size:45px;color:green"></i></a>
      </div>
      <div class="col-m-12 col-s-12 col-2 inner ">
        <a href="../Contact.php" class="inner" ><i class="fa fa-envelope" style="font-size:48px;color:brown"></i></a>
      </div>
      <div class="col-m-12 col-s-12 col-2 inner ">
        <a href="#" ><i class="fa fa-facebook" style="font-size:45px;color:blue"></i></a>
      </div>
    </div>
    <div class="row">
      <div class="col-m-12 col-s-12 col-12">
      </div>
    </div>
    <div class="row contact">
      <a href="..\Contact.php" class="col-m-12 col-s-4 col-2 ">Contact Us</a>
      <a href="#" class="col-m-12 col-s-4 col-2 ">EMI</a>
      <a href="..\warranty.php" class="col-m-12 col-s-4 col-2 ">Warranty Policy</a>
      <a href="#" class="col-m-12 col-s-4 col-2 ">Sell With Us</a>
      <a href="..\terms.php" class="col-m-12 col-s-4 col-2 ">Terms & Conditions</a>
      <a href="#" class="col-m-12 col-s-4 col-2 ">Bank Details</a>
    </div>
    <div class="row contact">
      <div class="col-m-12 col-s-12 col-12">
      </div>
    </div>
    <div class="">
      <p id="contact_us">© 2021 Tech Store. (Pvt) Ltd. All Rights Reserved.</p>
    </div>
  </footer>

  </body>
</html>

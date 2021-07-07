<?php
session_start();
include_once("..\..\configuration\configure.php");
$id = $_GET['id'];
$name = mysqli_query($sqli,"SELECT brand_name FROM brand_table WHERE brand_id = $id");
while($res = mysqli_fetch_array($name))
{
  $brandName = $res['brand_name'];
}
mysqli_close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tech Store. | <?php echo $brandName; ?></title>
    <link rel="stylesheet" href="..\..\css\footer.css">
    <link rel="stylesheet" href="..\..\css\Style.css">
    <link rel="stylesheet" href="..\..\css\header.css">
    <link rel="stylesheet" href="..\..\css\body.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="..\..\jquery files\header_category.js" type="text/javascript"> </script>

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
    <input type="text" name="search" value="" placeholder="Search" class="col-m-9 col-s-9 col-9">
    <button type="submit" name="submit" class="col-m-3 col-s-3 col-3">Search</button>
    </form>
    <hr>
    <a href="#" id="main_category">Catogeries</a>
    <ul id="categories">
    <?php
    $query = "SELECT * FROM `brand_table`;";
    $result = mysqli_query($sqli, $query);
    while ($res = mysqli_fetch_array($result)) {
      echo "<li><a href=\"categories.php?id=$res[brand_id]\">".$res['brand_name']."</a></li> <br>";
    }
    mysqli_close();
    ?>
    </ul>
  </div>

  <?php
    $query = "SELECT * FROM product_table WHERE brand_id = $id";
    $products = mysqli_query($sqli, $query);
    if ($products) {
      $count = 1;
      while ($res = mysqli_fetch_array($products)) {
        if ($count == 1) {
          echo "<div class=\"row\">";
          echo "<a href=\"..\Products\product.php?id=$res[product_id]\" ><div class=\"col-m-12 col-s-6 col-4 inner\">";
          echo "<img src=\"data:image/jpg;charset=utf8;base64,".base64_encode($res['image'])."alt=\" \">";
          echo "<p class=\"price\">".$res['name']."&nbsp;&nbsp;". $res['price']."<br>". $res['rating']."</p>";
          echo "</div></a>";
        }
        elseif ($count%3 == 0) {
          echo "<a href=\"..\Products\product.php?id=$res[product_id]\"><div class=\"col-m-12 col-s-6 col-4 inner\">";
          echo "<img src=\"data:image/jpg;charset=utf8;base64,".base64_encode($res['image'])."alt=\" \">";
          echo "<p class=\"price\">".$res['name']."&nbsp;&nbsp;". $res['price']."<br>". $res['rating']."</p>";
          echo "</div></a>";
          echo "</div> <br>";
          echo "<div class=\"row\">";
        }
        else {
          echo "<a href=\"..\Products\product.php?id=$res[product_id]\"><div class=\"col-m-12 col-s-6 col-4 inner\">";
          echo "<img src=\"data:image/jpg;charset=utf8;base64,".base64_encode($res['image'])."alt=\" \">";
          echo "<p class=\"price\">".$res['name']."&nbsp;&nbsp;". $res['price']."<br>". $res['rating']."</p>";
          echo "</div></a>";
        }
        $count++;
      }
      if ($count%3 == 0) {
        echo "<div class=\"col-m-12 col-s-6 col-4 inner\">";
        echo "</div><br><br><br>";
      }
      else {
        echo "<br><br><br>";
      }
    }
    else {
      echo "<p class =\"price\" > There was Error while loading Data from Database. Please try after sometime.</p>";
    }

    mysqli_close();
   ?>
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
        <a href="#" class="" ><i class="fa fa-facebook" style="font-size:45px;color:blue"></i></a>
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

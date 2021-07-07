<?php
session_start();
include_once("..\..\configuration\configure.php");
$id = $_GET['id'];
$name = mysqli_query($sqli,"SELECT * FROM product_table WHERE product_id = $id");
while($res = mysqli_fetch_array($name))
{
  $productName = $res['name'];
}
mysqli_close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\..\css\footer.css">
    <link rel="stylesheet" href="..\..\css\Style.css">
    <link rel="stylesheet" href="..\..\css\header.css">
    <link rel="stylesheet" href="..\..\css\body.css">
    <link rel="stylesheet" href="..\..\css\product.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="..\..\jquery files\header_category.js" type="text/javascript"> </script>
    <title>Tech Store. | <?php echo $productName; ?></title>
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
    <hr>
    <a href="#" id="main_category">Catogeries</a>
    <ul id="categories">
    <?php
    $query = "SELECT * FROM `brand_table`;";
    $result = mysqli_query($sqli, $query);
    while ($res = mysqli_fetch_array($result)) {
      echo "<li><a href=\"..\Categories\categories.php?id=$res[brand_id]\">".$res['brand_name']."</a></li> <br>";
    }
    mysqli_close();
    ?>
    </ul>
  </div>
  <hr>
  <div class="row">
    <?php
    $query =  "SELECT * FROM product_table JOIN brand_table USING(brand_id) where product_id = $id";
    $data = mysqli_query($sqli,$query);
    while($res = mysqli_fetch_array($data)){
      echo "<div class=\"col-m-12 col-s-6 col-4 inner\">";
      echo "<img src=\"data:image/jpg;charset=utf8;base64,".base64_encode($res['image'])."alt=\" \">";
      echo "</div>";
      echo "<div class=\"col-m-12 col-s-6 col-4 inner\">";
      echo "<h3>".$res['name']."</h3>";
      echo "<h4>Company: ".$res['brand_name']."</h4>";
      echo "<h2> Price: ".$res['price']."</h2>";
      echo "<table class=\"col-m-12 col-s-12 col-12\">";
      echo "<tr>";
      echo "<td class=\"main\">Condition</td>";
      echo "<td class=\"main\">Delivery</td>";
      echo "<td class=\"main\">Available</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td class=\"main bold\">New</td>";
      echo "<td class=\"main bold\">4 - 7 Working Days</td>";
      echo "<td class=\"main bold\">".$res['status']."</td>";
      echo "</tr>";
      echo "</table>";
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "<a href=\"..\cart\cart_updating.php?id=".$res[product_id]."\" class = \"col-m-12 col-s-12 col-12\"  id= \"cart\">Add To Cart
            <i class=\"fa fa-shopping-cart\"></i></a>";
    }
    mysqli_close();
  ?>
    </div>
    <div class="col-m-12 col-s-12 col-4 inner">
    <p><i class="fa fa-check-square-o" style="font-size:20px;color:black">Nationwide Delivery </i></p><br>
    <p><i class="fa fa-check-square-o" style="font-size:20px;color:black">Buyer Protection Guarantee</i></p>
    <p><i class="fa fa-check-square-o" style="font-size:20px;color:black">Trusted Sellers Only</i></p>
    <p><i class="fa fa-check-square-o" style="font-size:20px;color:black">7 days Return Policy</i></p>
    </div>
  </div>
  <div class="row">
    <div class="col-s-4 col-2"></div>
    <div class="col-m-12 col-s-12 col-8">
      <table id="data">
      <?php
      $query =  "SELECT * FROM product_table JOIN brand_table USING(brand_id) where product_id = $id";
      $data = mysqli_query($sqli,$query);
      while ($res = mysqli_fetch_array($data)) {
        echo "<tr class=\"tr\">";
        echo "<td class=\"td\">Annouced</td>
        <td class=\"td\">".$res['announced_date']."</td>";
        echo "</tr>";
        echo "<tr class=\"tr\">
              <td class=\"td\">Dimensions</td>";
        echo "<td class=\"td\">".$res['Dimensions']."</td></tr>";
        echo "<tr class=\"tr\">
          <td class=\"td\">SIM</td>";
        echo "<td class=\"td\">".$res['SIM']."</td></tr>";
        echo "<tr class=\"tr\">
          <td class=\"td\">Screen Type</td>";
        echo "<td class=\"td\">".$res['Screen_Type']."</td></tr>";
        echo "<tr class=\"tr\">
          <td class=\"td\">Size</td>";
        echo "<td class=\"td\">".$res['Screen_Size']."</td></tr>";
        echo "<tr class=\"tr\">
          <td class=\"td\">OS</td>";
        echo "<td class=\"td\">".$res['OS']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">Chipset</td>";
        echo "<td class=\"td\">".$res['Chipset']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">CPU</td>";
        echo "<td class=\"td\">".$res['CPU']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">Card Slot</td>";
        echo "<td class=\"td\">".$res['Card_slot']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">Internal Storage</td>";
        echo "<td class=\"td\">".$res['Internal_memory']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">Back Camera</td>";
        echo "<td class=\"td\">".$res['Back_Camera']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">Front Camera</td>";
        echo "<td class=\"td\">".$res['FrontCamera']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">Sensors</td>";
        echo "<td class=\"td\">".$res['Sensors']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">Battery Type</td>";
        echo "<td class=\"td\">".$res['battery_type']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">Charging</td>";
        echo "<td class=\"td\">".$res['Charging']."</td></tr>";

        echo "<tr class=\"tr\">
          <td class=\"td\">Available Models</td>";
        echo "<td class=\"td\">".$res['Available_models']."</td></tr>";
      }
      mysqli_close();
      ?>
      </table>
    </div>
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

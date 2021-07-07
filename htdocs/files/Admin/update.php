<?php
session_start();
require("..\..\configuration\configure.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="..\..\css\Style.css">
    <link rel="stylesheet" href="..\..\css\body.css">
    <link rel="stylesheet" href="..\..\css\header.css">
    <link rel="stylesheet" href="..\..\css\footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Updation</title>
  </head>
  <body>
    <div class = "row">
      <h1 class= "col-m-12 col-s-12 col-2">Tech <span>Store.</span></h1>
      <a href="..\..\index.php" class="col-m-12 col-s-12 col-2 main_ifo">Home</a>
      <a href="..\ABOUT US.php" class="col-m-12 col-s-12 col-2 main_ifo">About</a>
      <a href="..\Contact.php" class="col-m-12 col-s-12 col-2 main_ifo">Contact Us</a>
    <?php
    if (isset($_SESSION["admin_in"])) {
     $admin_in = $_SESSION["admin_in"];
      $query = "SELECT * FROM admin_table WHERE admin_id = $admin_in;";
      $result = mysqli_query($sqli, $query);
      while ($res = mysqli_fetch_array($result)) {
      echo "<a href=\"..\..\log-in\log_out_admin.php\" class=\"col-m-12 col-s-12 col-3 main_ifo\" onclick=\"confirm('You Want To Log Out.');\">".$res['admin_name']."</a>";
    }}
     else {
         echo "<a href=\"..\..\log-in\adminsignin.php\" class=\"col-m-12 col-s-12 col-3 main_ifo\">Sign In/Sign Up</a>";
      }
      mysqli_close();
    ?>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <hr>
    <?php
    if (isset($_POST['update'])) {
      $old_name = mysqli_real_escape_string($sqli, $_POST['old_name']);
      $new_name = mysqli_real_escape_string($sqli, $_POST['new_name']);
    }
    if (empty($old_name) || empty($new_name)) {
      echo '<h2>Please Fill both the fields.<h2>';
      echo "<a href=\"admin.php\">Go Back</a>";
    }
    else {
        $old_rows = "SELECT * FROM brand_table where brand_name = '$new_name';";
        $rows = mysqli_query($sqli, $old_rows);
        if ($rows >1) {
          mysqli_close();
          echo '<h2>This Category already exist can\'t add it.<h2>';
          echo "<a href=\"admin.php\">Go Back</a>";
        }
        else {
          $query = "SELECT brand_id FROM brand_table WHERE brand_name = '$old_name';";
          $result = mysqli_query($sqli, $query);

          while ($res = mysqli_fetch_array($result)) {
            $brandId = $res['brand_id'];
          }
          $update = "UPDATE brand_table SET brand_name = '$new_name' WHERE brand_id ='$brandId';";
          $updated = mysqli_query($sqli, $update);
          if ($updated) {
            mysqli_close();
            echo '<h2>Name Updated Successfully.</h2>';
            echo "<a href=\"admin.php\">Go Back</a>";
          }
          else {
            mysqli_close();
            echo '<h2>Database Error. Please try after sometime.</h2>';
            echo "<a href=\"admin.php\">Go Back</a>";
          }
        }
    }
     ?>
     <footer class="change_footer">
       <div class="row contact">
         <div class="col-m-12 col-s-12 col-6 ">
           <h3>We're Always Ready To Help</h3>
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
       </div>
       <div class="row">
         <div class="col-m-12 col-s-12 col-12">
         </div>
       </div>
       <div class="row contact">
         <a href="../Contact.php" class="col-m-12 col-s-4 col-2 ">Contact Us</a>
         <a href="#" class="col-m-12 col-s-4 col-2 ">EMI</a>
         <a href="../warranty.php" class="col-m-12 col-s-4 col-2 ">Warranty Policy</a>
         <a href="#" class="col-m-12 col-s-4 col-2 ">Sell With Us</a>
         <a href="../terms.php" class="col-m-12 col-s-4 col-2 ">Terms & Conditions</a>
         <a href="#" class="col-m-12 col-s-4 col-2 ">Bank Details</a>
       </div>
       <div class="row contact">
         <div class="col-m-12 col-s-12 col-12">
         </div>
       </div>
       <div class="">
         <p class="contact_us">© 2021 Tech Store. (Pvt) Ltd. All Rights Reserved.</p>
       </div>
     </footer>
  </body>
</html>

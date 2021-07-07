<?php
session_start();
require("..\..\configuration\configure.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\..\css\Style.css">
    <link rel="stylesheet" href="..\..\css\body.css">
    <link rel="stylesheet" href="..\..\css\header.css">
      <link rel="stylesheet" href="..\..\css\footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Product Addition</title>
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
    if (isset($_POST['add'])) {
      $pName = mysqli_real_escape_string($sqli,$_POST['p_name']);
      $pDate = mysqli_real_escape_string($sqli,$_POST['p_date']);
      $pStatus = mysqli_real_escape_string($sqli,$_POST['p_status']);
      $pDimens = mysqli_real_escape_string($sqli,$_POST['p_dimension']);
      $pSim = mysqli_real_escape_string($sqli,$_POST['p_sim']);
      $pDisType = mysqli_real_escape_string($sqli,$_POST['p_dis_type']);
      $pScSize = mysqli_real_escape_string($sqli,$_POST['p_sc_size']);
      $pOS = mysqli_real_escape_string($sqli,$_POST['p_os']);
      $pChipset = mysqli_real_escape_string($sqli,$_POST['p_chipset']);
      $pCPU = mysqli_real_escape_string($sqli,$_POST['p_cpu']);
      $pCslot = mysqli_real_escape_string($sqli,$_POST['p_c_slot']);
      $pMemory = mysqli_real_escape_string($sqli,$_POST['p_memory']);
      $pBackCamera = mysqli_real_escape_string($sqli,$_POST['p_b_camera']);
      $pFrontCamera = mysqli_real_escape_string($sqli,$_POST['p_f_camera']);
      $pSensors = mysqli_real_escape_string($sqli,$_POST['p_sensor']);
      $pBtype = mysqli_real_escape_string($sqli,$_POST['p_b_type']);
      $pBcharging = mysqli_real_escape_string($sqli,$_POST['p_b_charging']);
      $pModels = mysqli_real_escape_string($sqli,$_POST['p_models']);
      $pPrice = mysqli_real_escape_string($sqli,$_POST['p_price']);
      $pBrand = mysqli_real_escape_string($sqli,$_POST['brand_name']);
      $pImage = mysqli_real_escape_string($sqli,$_POST['img']);
    }

    if (empty($pName) || empty($pDate) || empty($pDimens) || empty($pSim) || empty($pDisType) || empty($pScSize) ||
        empty($pOS) || empty($pChipset) || empty($pCPU) || empty($pCslot) || empty($pMemory) || empty($pBackCamera) ||
        empty($pFrontCamera) || empty($pSensors) || empty($pBtype) || empty($pBcharging) || empty($pModels) || empty($pPrice) || empty($pBrand)
        || empty($pStatus)) {
          echo '<h2>Some of the fields are empty. Please Fill all fields.<h2>';
          echo "<a href=\"admin.php\">Go Back</a>";
    }
    else
    {
      $names = array();
      $brand_query = "SELECT * FROM brand_table;";
      $execute = mysqli_query($sqli, $brand_query);
      while ($res = mysqli_fetch_array($execute)) {
        array_push($names, $res['brand_name']);
      }
      mysqli_close();
      if(in_array($pBrand,$names))
      {
        $brand_query = "SELECT * FROM brand_table WHERE brand_name = '$pBrand';";
       $execute = mysqli_query($sqli, $brand_query);
       while ($res = mysqli_fetch_array($execute)) {
        $id = $res['brand_id'];
       }
       mysqli_close();
       if(!empty($_FILES['img']['name']))
       {
         $fileName = basename($_FILES["img"]["name"]);
         $image = $_FILES['img']['tmp_name'];
         $imgContent = addslashes(file_get_contents($image));

         $correctDate = strtotime($pDate);
         $date = date("Y-m-d",$correctDate);
         $query = "INSERT INTO product_table(name, announced_date, status, Dimensions, SIM, Screen_Type, Screen_Size,
                   OS, Chipset, CPU, Card_slot, Internal_memory, Back_Camera, FrontCamera, Sensors,battery_type, Charging, Available_models,
                   	price, image, brand_id)
                    VALUES ('$pName', '$date', '$pStatus', '$pDimens', '$pSim', '$pDisType','$pScSize','$pOS',
                    '$pChipset', '$pCPU','$pCslot','$pMemory','$pBackCamera','$pFrontCamera','$pSensors','$pBtype','$pBcharging','$pModels',
                    '$pPrice','$imgContent','$id');";
          $result = mysqli_query($sqli, $query);
          mysqli_close();
          if ($result) {
            echo '<h2>Product Added Successfully.<h2>';
            echo "<a href=\"admin.php\">Go Back</a>";
          }
          else {
            echo '<h2>Error in loading database. Please try after sometime.<h2>';
            echo "<a href=\"admin.php\">Go Back</a>";

          }
       }
       else {
         echo '<h2>Error in storing Image of product. Please Try after sometime.<h2>';
         echo "<a href=\"admin.php\">Go Back</a>";
       }
      }
      else {
        echo '<h2>Brand Not Found. Please Select from given ones.<h2>';
        echo "<a href=\"admin.php\">Go Back</a>";
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

<?php
session_start();
require("..\..\configuration\configure.php");
$id = $_GET['id'];
$query = "SELECT * FROM product_table WHERE product_id = $id";
$result = mysqli_query($sqli, $query);
if($result > 0)
{
  while ($res = mysqli_fetch_array($result)) {
    $pName =  $res['name'];
    $pDate =  $res['announced_date'];
    $pStatus =  $res['status'];
    $pDimens =  $res['Dimensions'];
    $pSim =  $res['SIM'];
    $pDisType =  $res['Screen_Type'];
    $pScSize =  $res['Screen_Size'];
    $pOS =  $res['OS'];
    $pChipset =  $res['Chipset'];
    $pCPU =  $res['CPU'];
    $pCslot =  $res['Card_slot'];
    $pMemory =  $res['Internal_memory'];
    $pBackCamera =  $res['Back_Camera'];
    $pFrontCamera =  $res['FrontCamera'];
    $pSensors =  $res['Sensors'];
    $pBtype =  $res['battery_type'];
    $pBcharging =  $res['Charging'];
    $pModels =  $res['Available_models'];
    $pPrice =  $res['price'];
    $pBrand =  $res['brand_id'];
    $pImage =  $res['image'];
    $pRating = $res['rating'];
  }
  $brand  = "SELECT * FROM brand_table WHERE brand_id = $pBrand;";
  $execute = mysqli_query($sqli, $brand);
  while($rest = mysqli_fetch_array($execute))
  {
    $brandName = $rest['brand_name'];
  }
}
else {
  echo mysqli_error($sqli);
}

mysqli_close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\..\css\Style.css">
    <link rel="stylesheet" href="..\..\css\header.css">
      <link rel="stylesheet" href="..\..\css\footer.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <title>Tech Store. | Edit Product</title>
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
      <div class="row">
        <div class="col-m-12 col-s-12 col-4"></div>
        <div class="col-m-12 col-s-12 col-6">
          <form class="" action="update_product.php" method="post" enctype="multipart/form-data">
            <table>
              <tr>
                <th>Product ID</th>
                <td> <input type="number" name="p_id" value="<?php echo $id; ?>" readonly> </td>
              </tr>
              <tr>
                <th>Name</th>
                <td> <input type="text" name="p_name" value="<?php echo $pName; ?>"> </td>
              </tr>
              <tr>
                <th>Announced Date</th>
                <td> <input type="text" name="p_date" value="<?php echo $pDate; ?>"> </td>
              </tr>
              <tr>
                <th>Status</th>
                <td><input type="text" name="p_status" value="<?php echo $pStatus; ?>"></td>
              </tr>
              <tr>
                <th>Dimensions</th>
                <td><input type="text" name="p_dimension" value="<?php echo $pDimens; ?>"></td>
              </tr>
              <tr>
                <th>SIM</th>
                <td><input type="text" name="p_sim" value="<?php echo $pSim; ?>"></td>
              </tr>
              <tr>
                <th>Screen Type</th>
                <td><input type="text" name="p_dis_type" value="<?php echo $pDisType; ?>"></td>
              </tr>
              <tr>
                <th>Screen Size</th>
                <td><input type="text" name="p_sc_size" value="<?php echo $pScSize; ?>"></td>
              </tr>
              <tr>
                <th>OS</th>
                <td><input type="text" name="p_os" value="<?php echo $pOS; ?>"></td>
              </tr>
              <tr>
                <th>Chipset</th>
                <td><input type="text" name="p_chipset" value="<?php echo $pChipset; ?>"></td>
              </tr>
              <tr>
                <th>CPU</th>
                <td><input type="text" name="p_cpu" value="<?php echo $pCPU; ?>"></td>
              </tr>
              <tr>
                <th>Card Slot</th>
                <td><input type="text" name="p_c_slot" value="<?php echo $pCslot; ?>"></td>
              </tr>
              <tr>
                <th>Internal Memory</th>
                <td><input type="text" name="p_memory" value="<?php echo $pMemory; ?>"></td>
              </tr>
              <tr>
                <th>Back Camera</th>
                <td><input type="text" name="p_b_camera" value="<?php echo $pBackCamera; ?>"></td>
              </tr>
              <tr>
                <th>Front Camera</th>
                <td><input type="text" name="p_f_camera" value="<?php echo $pFrontCamera; ?>"></td>
              </tr>
              <tr>
                <th>Sensors</th>
                <td><input type="text" name="p_sensor" value="<?php echo $pSensors; ?>"></td>
              </tr>
              <tr>
                <th>Battery Type</th>
                <td><input type="text" name="p_b_type" value="<?php echo $pBtype; ?>"></td>
              </tr>
              <tr>
                <th>Charging</th>
                <td><input type="text" name="p_b_charging" value="<?php echo $pBcharging; ?>"></td>
              </tr>
              <tr>
                <th>Models</th>
                <td><input type="text" name="p_models" value="<?php echo $pModels; ?>"></td>
              </tr>
              <tr>
                <th>Price</th>
                <td> <input type="text" name="p_price" value="<?php echo $pPrice; ?>"> </td>
              </tr>
              <tr>
                <th>Product Image</th>
                <td> <img src="data:image/jpg;charset=utf8;base64,""<?php echo base64_encode($res['image']); ?> "/></td>
                <th>Product Image</th>
                <td> <input type="file" name="p_image" accept="image/*">  </td>
              </tr>
              <tr>
                <th>Product Rating</th>
                <td> <input type="text" name="p_rating" value="<?php echo $pRating; ?>"> </td>
              </tr>
              <tr>
                <th>Company</th>
                <td> <input type="text" name="p_company" value="<?php echo $brandName; ?>"> </td>
              </tr>
              <tr>
                <td  colspan="2"> <input type="submit" name="update" value="Update"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
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

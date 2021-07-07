<?php
session_start();
require("..\..\configuration\configure.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\..\css\Style.css">
    <link rel="stylesheet" href="..\..\css\header.css">
      <link rel="stylesheet" href="..\..\css\footer.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="..\..\jquery files\admin.js" type="text/javascript"></script>
      <script>
        $(function(){
          $("#messages_all").on("click",function(){
            $("#table").hide();
            $(".category").hide();
            $(".addition_product").hide();
            $(".showing_product").hide();
            if($(".messages").is(":visible"))
            {
              $(".messages").slideUp("1000");
            }
            else {
              $(".messages").slideDown("1000");
            }
          });
        });
      </script>
      <style media="screen">
        td{
          border: 1px solid black;
        }
        input{
          width: 100%;
        }
      </style>
      <title>Tech Store. Admin Side</title>
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
    <div class="col-s-3 col-3">
    </div>
    <div class="col-m-12 col-s-6 col-6">
      <h2 id="cat_head">Categories</h2>
      <table id="table">
        <tr>
          <td id="all_categori">All Categories</td>
          <td id="add_categori">Add Category</td>
          <td id="updat_categori">Update Category</td>
          <td id="del_categori">Delete Category</td>
        </tr>
      </table>
      <div class="category">
      <?php
      $query = "SELECT * FROM brand_table;";
      $brands = mysqli_query($sqli,$query);
      echo "<div class=\"categories\">";
      echo "<ol>";
      while ($res = mysqli_fetch_array($brands)) {
        echo "<li>".$res['brand_name']."</li>";
      }
      echo "</ol></div>";
      mysqli_close();
      ?>
        <div class="new_category">
          <form class="" action="add_brand.php" method="POST">
          <input type="text" name="new_name" value="" placeholder="Enter Name">
          <input type="submit" name="add" value="Add">
          </form>
        </div>
        <div class="change_category">
          <h3>Select Category</h3>
          <?php
          $query = "SELECT * FROM brand_table;";
          $brands = mysqli_query($sqli,$query);
          echo "<ol id=\"change\">";
         while ($res = mysqli_fetch_array($brands)) {
            echo "<li>".$res['brand_name']."</li>";
          }
          echo "</ol>";
          mysqli_close();
          ?>
          <form class="" action="update.php" method="POST">
          <input type="text" name="old_name" placeholder ="Select Any Category" id="change_input">
          <input type="text" name="new_name" placeholder="Enter New Name">
          <input type="submit" name="update" value="Update">
          </form>
        </div>
        <div class="remove_category">
          <h3>Select Category</h3>
          <?php
          $query = "SELECT * FROM brand_table;";
          $brands = mysqli_query($sqli,$query);
          echo "<ol id=\"delete\">";
         while ($res = mysqli_fetch_array($brands)) {
            echo "<li>".$res['brand_name']."</li>";
          }
          echo "</ol>";
          mysqli_close();
          ?>
          <form class="" action="delete.php" method="post">
          <input type="text" name="old_name" value="" placeholder ="Select Category" id="remove_input">
          <input type="submit" name="delete" value="Delete">
          </form>
        </div>
      </div>
      <h2 id="add_product">Add New Product</h2>
      <div class="addition_product">
        <form class="" action="add_product.php" method="POST" enctype="multipart/form-data">
          <label>Product Name</label><br><br>
          <input type="text" name="p_name" value="" placeholder="Enter Product Name"><br><br>
          <label>Announced Date</label><br><br>
          <input type="date" name="p_date" value="" ><br><br>
          <label>Status</label>
          <ol id = "status">
            <li>Available</li>
            <li>Not-Available</li>
          </ol>
          <input type="text" name="p_status" value="" id="status_input"><br><br>
          <label>Dimensions</label><br><br>
          <input type="text" name="p_dimension" value=""><br><br>
          <label>SIM</label><br><br>
          <input type="text" name="p_sim" value=""><br><br>
          <label>Screen Type</label><br><br>
          <input type="text" name="p_dis_type" value=""><br><br>
          <label>Screen Size</label><br><br>
          <input type="text" name="p_sc_size" value=""><br><br>
          <label>OS</label><br><br>
          <input type="text" name="p_os" value=""><br><br>
          <label>Chipset</label><br><br>
          <input type="text" name="p_chipset" value=""><br><br>
          <label>CPU</label><br><br>
          <input type="text" name="p_cpu" value=""><br><br>
          <label>Card Slot</label><br><br>
          <input type="text" name="p_c_slot" value=""><br><br>
          <label>Internal Memory</label><br><br>
          <input type="text" name="p_memory" value=""><br><br>
          <label>Back Camera</label><br><br>
          <input type="text" name="p_b_camera" value=""><br><br>
          <label>Front Camera</label><br><br>
          <input type="text" name="p_f_camera" value=""><br><br>
          <label>Sensors</label><br><br>
          <input type="text" name="p_sensor" value=""><br><br>
          <label>Battey Type</label><br><br>
          <input type="text" name="p_b_type" value=""><br><br>
          <label>Charging</label><br><br>
          <input type="text" name="p_b_charging" value=""><br><br>
          <label>Models</label><br><br>
          <input type="text" name="p_models" value=""><br><br>
          <label>Price</label><br><br>
          <input type="text" name="p_price" value=""><br><br>
          <label>Select Brand</label><br><br>
          <ol id="brand">
          <?php
          $query = "SELECT * FROM brand_table;";
          $brands = mysqli_query($sqli,$query);

         while ($res = mysqli_fetch_array($brands)) {
            echo "<li>".$res['brand_name']."</li>";
          }
          mysqli_close();
          ?>
        </ol>
          <input type="text" name="brand_name" value="" placeholder ="Select Category" id="brand_input">
          <br>
          <br>
          <label for="img">Select image:</label>
          <input type="file" id="img" name="img" accept="image/*">
          <input type="submit" name="add" value="Add Product">
        </form>
      </div>
      <h2 id="all_product">All Products</h2>
      <div class="showing_product">
        <table>
          <tr>
            <th>Product Name</th>
            <th>Product Price</th>
            <th colspan="2"></th>
          </tr>

          <?php
          $query = "SELECT * FROM product_table;";
          $result = mysqli_query($sqli, $query);
          while ($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['price']."</td>";
            echo "<td><a href=\"edit.php?id=$res[product_id]\">Edit</a> | <a href=\"delete_product.php?id=$res[product_id]\">Delete</a> </td>";
            echo "</tr>";
          }
           ?>
        </table>
      </div>
      <h2 id="messages_all">Messages</h2>
      <div class="messages">
        <table >
        <?php
          $query = "SELECT * FROM contact_us_table
          JOIN customer_table USING(customer_id) ORDER BY message_id DESC";
          $result = mysqli_query($sqli,$query);
          while($res = mysqli_fetch_array($result))
          {
            echo "<tr>";
            echo "<td>Title: ".$res['title']."</td></tr>";
            echo "<tr><td>Message: ".$res['message'].". (From: ".$res['customer_email']." &nbsp;&nbsp;&nbsp;#".$res['message_id'].")</td>";
            echo "</tr>";
          }
         ?>
         </table>
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

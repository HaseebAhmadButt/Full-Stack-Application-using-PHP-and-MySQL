<?php
session_start();
include_once("..\configuration\configure.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tech Store. | About Us</title>
      <link rel="stylesheet" href="..\css\Style.css">
      <link rel="stylesheet" href="..\css\header.css">
      <!-- <link rel="stylesheet" href="..\css\aboutus.css"> -->
      <link rel="stylesheet" href="..\css\body.css">
      <link rel="stylesheet" href="..\css\footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>
<body>
      <div class = "row">
        <h1 class= "col-m-12 col-s-12 col-2">Tech <span>Store.</span></h1>
        <a href="..\index.php" class="col-m-12 col-s-12 col-1 main_ifo">Home</a>
        <a href="ABOUT US.php" class="col-m-12 col-s-12 col-2 main_ifo">About</a>
        <a href="Contact.php" class="col-m-12 col-s-12 col-2 main_ifo">Contact Us</a>
        <a href="\files\cart\cart.php" class="col-m-12 col-s-12 col-1 main_ifo">Cart</a>
        <?php
        if (isset($_SESSION["log_in"])) {
         $log_in = $_SESSION["log_in"];
          $query = "SELECT * FROM customer_table WHERE customer_id = $log_in;";
          $result = mysqli_query($sqli, $query);
          while ($res = mysqli_fetch_array($result)) {
          echo "<a href=\"..\log-in\log_out.php\" class=\"col-m-12 col-s-12 col-3 main_ifo\" onclick=\"confirm('You Want To Log Out.')\">".$res['customer_name']."</a>";
          }}
         else {
             echo "<a href=\"..\log-in\customersignin.php\" class=\"col-m-12 col-s-12 col-3 main_ifo\">Sign In/Sign Up</a>";
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
<div id="row">
  <div class="col-m-12 col-s-12 col-12 ">
    <h3>TECH STORE&nbsp; A&nbsp; MARKETPLACE</h3>
    <h3>A COMMUNITY</h3>
  </div>
</div>
<hr id="gap">
<div id="Box1" class="col-m-12 col-s-12 col-12 ">
<p><br>
    Who we are
<br>
Tech store is the leading online marketplace In South Asla, empowering tens of thousands of sellers to connect with millions of customers. Tech store provides immediate and easy access to 10 million products In more than 100+ categories and delivers more than 2 million packages every month to all corners of its countries.  <br>
Tech store is a mall, a marketplace and a community for its customers. It is also a university for entrepreneurs, and every month it educates more than 5,000 new sellers on e-commerce operations. <br>
To overcome the logistics challenge in its markets, Tech store has built its own logistics company specifically designed for e-commerce operations - Tech store Express (known as DEX) - to raise the standards for the industry. Tech store Is also helping existing and new logistics providers digitize. <br>
In 2018, Tech store was acquired by Allbaba Group, and is proud to carry Its part of the mission to 'make it easy to do business anywhere in the era of the digital economy'. As part of the Alibaba ecosystem, Tech store is leveraging Alibaba's global leadership and experience in technology, online commerce, mobile payments and logistics to drive growth in Its <br></p>
</div>
<div class="row">
  <div class="col-m-12 col-s-2 col-1 ">
    </div >
    <div class="col-m-12 col-s-4 col-3 ">
      <h2>A university for entrepreneurs</h2> <br> <p> Daraz is a university for entrepreneurs.
      Our education is free of charge and anyone who has a smartphone can start a business. 20,000 sellers have been educated on ecommerce operations through Daraz University. Every month, we educate 5,000 new sellers and provide advaced online and offline training courses to our existing sellers.</p>
    </div>
    <div class="col-m-12 col-2">

    </div>
    <div class="col-m-12 col-s-6 col-5">
        <iframe height="50%" width="100%"  src="https://www.youtube.com/embed/oYRda7UtuhA?controls=0"></iframe>
    </div>
</div>
<footer class="change_footer">
  <div class="row contact">
    <div class="col-m-12 col-s-12 col-6 ">
      <h2>We're Always Ready To Help</h2>
      <p>Reach out to us through any of these support channels</p>
    </div>
    <div class="col-m-12 col-s-12 col-2 inner ">
      <a href="Contact.php" class="inner" style="padding-left: 50px;"><i class="fa fa-whatsapp" style="font-size:45px;color:green"></i></a>
    </div>
    <div class="col-m-12 col-s-12 col-2 inner ">
      <a href="Contact.php" class="inner" ><i class="fa fa-envelope" style="font-size:48px;color:brown"></i></a>
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
    <a href="Contact.php" class="col-m-12 col-s-4 col-2 ">Contact Us</a>
    <a href="#" class="col-m-12 col-s-4 col-2 ">EMI</a>
    <a href="warranty.php" class="col-m-12 col-s-4 col-2 ">Warranty Policy</a>
    <a href="#" class="col-m-12 col-s-4 col-2 ">Sell With Us</a>
    <a href="terms.php" class="col-m-12 col-s-4 col-2 ">Terms & Conditions</a>
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

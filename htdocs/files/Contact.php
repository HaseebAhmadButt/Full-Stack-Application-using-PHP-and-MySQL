<?php
session_start();
include_once("..\configuration\configure.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tech Store. | Contact Us</title>
      <link rel="stylesheet" href="..\css\Style.css">
      <link rel="stylesheet" href="..\css\header.css">
      <link rel="stylesheet" href="..\css\contact.css">
      <link rel="stylesheet" href="..\css\body.css">
      <link rel="stylesheet" href="..\css\footer.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="..\..\jquery files\header_category.js" type="text/javascript"> </script>
</head>
<body>
    <body>
        <div class = "row">
          <h1 class= "col-m-12 col-s-12 col-2">Tech <span>Store.</span></h1>
          <a href="..\index.php" class="col-m-12 col-s-12 col-1 main_ifo">Home</a>
          <a href="ABOUT US.php" class="col-m-12 col-s-12 col-2 main_ifo">About</a>
          <a href="Contact.php" class="col-m-12 col-s-12 col-2 main_ifo">Contact Us</a>
          <a href="cart\cart.php" class="col-m-12 col-s-12 col-1 main_ifo">Cart</a>
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
 <h2>CONTACT US</h2>
<div class="row">
<div class="col-m-12 col-s-12 col-2"></div>
<div class="col-m-12 col-s-4 col-4">
    <form action="Contact.php" method="POST">
        <label for="Title" id="labe">Title:</label><br>
        <input type="text" id="title" name="title"  ><br>
        <label for="lname" id="labe">Message:</label><br>
        <input type="text-area" id="lname" name="message" ><br> <br>
        <button type="submit" name="submit" id="labe">Send Message</button>
    </form>
    <?php
    if (isset($_SESSION['log_in'])) {
      if (isset($_POST['submit']))
      {
        $title = mysqli_real_escape_string($sqli,$_POST['title']);
        $message = mysqli_real_escape_string($sqli,$_POST['message']);
        if (empty($title) || empty($message)) {
        echo "<p>Fields are Empty. Please Fill All Fields.</p>";
        }
        else {
          $cID = $_SESSION['log_in'];
          $query = "INSERT INTO contact_us_table(customer_id,title,message)
                    VALUES ('$cID','$title','$message')";
          $result = mysqli_query($sqli,$query);
          if ($result) {
            echo "<p>Message Sent Success Fully</p>";
          }
          else {
            echo "<p>Connection Error in Sending Message. Please ty after sometime.</p>";
          }
        }
      }
    }
    else {
      echo "<p>You need account to send message. Create Account.</p>";
    }
    mysqli_close();
     ?>
</div>
<div class="col-m-12 col-s-5 col-4">
    <a href="">
        <img src="Simple-Location-Picker.png" alt="Location">
    </a>
Indus Loop, H-12, Islamabad <br> Islamabad Capital Territory, Pakistan
<br>+92 321 6659165 &#128512;
</div>
</div>
<footer class="change_footer">
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <hr>
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

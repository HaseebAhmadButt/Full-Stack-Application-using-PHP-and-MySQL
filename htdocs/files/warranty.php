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
      <h2>WARRANTY POLICY</h2>
      <div class="row">
    <div class="col-m-12 col-s-12 col-12">
    <p><b> 1. Preface </b> <br>
        We sincerely hope you would be satisfied with the new product. Based on laws and regulations related to the
        protection of consumer rights and interests in Pakistan and Huawei's policies, Huawei formulates Huawei's
        product warranty policy, according to which you could return, replace, or repair the products return, replace,
        or repair the products. We are willing to provide related services. <br>
         Warranty services <br>
         Warranty object and scope <br>
         Phones  <br>
         Warranty services <br>
         Return services <br>

         <br>
       <b> 1. Return Accepted Standard: </b> <br>
        either before receiving the product, or within 7 days after receiving the product
        provided that the package is in good conditions, unopened case with seal.

       <br> 2. All returns and refunds applications will be verified properly. In case of the return has no valid
        reason from customer, the package will be returned back to the customer.
     <br>   2.2.1.2 Return Guide.
      <br>  (1) Please back up and delete your personal data before returning the device.
       <br> (2) It is recommended that you check the following list before applying for return:
        Service Type The host and accessories are complete. The packing box is complete. Invoice without altering
        Giveaway (if involved)
        Returning √ √ √ √
       <br> 2.2.2 Replacement services
       <br> 2.2.2.1 Replacement Period
        Within 7 days from the date of purchase, if a performance fault that is not caused by human damage occurs on the
        host of the product, you can choose to return the goods at one time based on the invoice price.
      <br>  2.2.2.2 Replacement Guide
       <br> (1) If you purchased the product in retail store, please go to the store to apply for replacement.
       <br> (2) If you purchased the product on the online store, please apply for replacement according to the guide on
        website.
      <br>  (3) Please back up and delete your personal data before submitting your device. Huawei shall not take any
        liability or responsibility for loss of your data.</p>
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
        <p id="contact_us">© 2021 Tech Store. (Pvt) Ltd. All Rights Reserved.</p>
      </div>
    </footer>
</body>
</html>

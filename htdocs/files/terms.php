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
          <a href="ABOUT US.HTML" class="col-m-12 col-s-12 col-2 main_ifo">About</a>
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
      <div class="row">
    <div class="col-m-12 col-s-12 col-12">
        <h2>Terms and Conditions</h2>

        <h4>Conditions of Use</h4>
        <h4>Last updated: May 3, 2021</h4>


        <p>
            Welcome to Tech store.com. Tech store.com Services LLC and/or its affiliates
            ("Tech store") provide website features and other products and services to you
            when you visit or shop at Tech store.com, use Tech store products or services, use Tech store
            applications for mobile, or use software provided by Tech store in connection with any of
            the foregoing (collectively, "Tech store Services"). By using the Tech store Services, you agree
            on behalf of yourself and all members of your household and others who use any Service under your account
            to the following conditions.

        </p>

        <p>

            <b> Please read these conditions carefully. </b> <br>
            We offer a wide range of Amazon Services, and sometimes additional terms may apply. When you use an Amazon
            Service (for example, Your Profile, Gift Cards, Amazon Video, Your Media Library, Amazon devices, or Amazon
            applications) you also will be subject to the guidelines, terms and agreements applicable to that Amazon
            Service ("Service Terms"). If these Conditions of Use are inconsistent with the Service Terms, those Service
            Terms will control.
        </p>

<p>
    <b>  PRIVACY </b>   <br>
        Please review our Privacy Notice, which also governs your use of Amazon Services, to understand our practices.

</p>
<p>
     <b>  ELECTRONIC COMMUNICATIONS </b>  <br>
        When you use Amazon Services, or send e-mails, text messages, and other communications from your desktop or
        mobile device to us, you may be communicating with us electronically. You consent to receive communications from
        us electronically, such as e-mails, texts, mobile push notices, or notices and messages on this site or through
        the other Amazon Services, such as our Message Center, and you can retain copies of these communications for
        your records. You agree that all agreements, notices, disclosures, and other communications that we provide to
        you electronically satisfy any legal requirement that such communications be in writing.
    </p>

    <p>

      <b> COPYRIGHT </b>   <br>
        All content included in or made available through any Amazon Service, such as text, graphics, logos, button
        icons, images, audio clips, digital downloads, data compilations, and software is the property of Amazon or its
        content suppliers and protected by United States and international copyright laws. The compilation of all
        content included in or made available through any Amazon Service is the exclusive property of Amazon and
        protected by U.S. and international copyright laws.
    </p>


    <p>
     <b>  TRADEMARKS  </b>  <br>
        Click here to see a non-exhaustive list of Amazon trademarks. In addition, graphics, logos, page headers, button
        icons, scripts, and service names included in or made available through any Amazon Service are trademarks or
        trade dress of Amazon in the U.S. and other countries. Amazon's trademarks and trade dress may not be used in
        connection with any product or service that is not Amazon's, in any manner that is likely to cause confusion
        among customers, or in any manner that disparages or discredits Amazon. All other trademarks not owned by Amazon
        that appear in any Amazon Service are the property of their respective owners, who may or may not be affiliated
        with, connected to, or sponsored by Amazon.

    </p>

    <p>
      <b>  PATENTS  </b> <br>
        One or more patents owned by Amazon apply to the Amazon Services and to the features and services accessible via
        the Amazon Services. Portions of the Amazon Services operate under license of one or more patents. Click here to
        see a non-exhaustive list of applicable Amazon patents and applicable licensed patents.

    </p>

    <p>
    <b>   LICENSE AND ACCESS  </b>   <br>
        Subject to your compliance with these Conditions of Use and any Service Terms, and your payment of any
        applicable fees, Amazon or its content providers grant you a limited, non-exclusive, non-transferable,
        non-sublicensable license to access and make personal and non-commercial use of the Amazon Services. This
        license does not include any resale or commercial use of any Amazon Service, or its contents; any collection and
        use of any product listings, descriptions, or prices; any derivative use of any Amazon Service or its contents;
        any downloading, copying, or other use of account information for the benefit of any third party; or any use of
        data mining, robots, or similar data gathering and extraction tools. All rights not expressly granted to you in
        these Conditions of Use or any Service Terms are reserved and retained by Amazon or its licensors, suppliers,
        publishers, rightsholders, or other content providers. No Amazon Service, nor any part of any Amazon Service,
        may be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose
        without express written consent of Amazon. You may not frame or utilize framing techniques to enclose any
        trademark, logo, or other proprietary information (including images, text, page layout, or form) of Amazon
        without express written consent. You may not use any meta tags or any other "hidden text" utilizing Amazon's
        name or trademarks without the express written consent of Amazon. You may not misuse the Amazon Services. You
        may use the Amazon Services only as permitted by law. The licenses granted by Amazon terminate if you do not
        comply with these Conditions of Use or any Service Terms.

    </p>
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

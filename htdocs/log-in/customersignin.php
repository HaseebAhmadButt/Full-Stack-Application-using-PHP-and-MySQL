<?php
session_start();
// including the database connection file
include_once("..\configuration\configure.php");
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="..\..\css\customersignin.css">
</head>
<body>

<h2>Customer Log In</h2>

<form action="customer_sign_check.php" method="post">
  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <input type="submit" name="submit" value="Log In" id = "logIn">

  </div>

	<div class="container" style="background-color:#DDDFE6">
    <button type="button" class="cancelbtn" onclick="load()">Sign Up</button>
  </div>
</form>
<script type="text/javascript">
	function load(){
		window.location.href = "signup.php";
	}
</script>

</body>
</html>

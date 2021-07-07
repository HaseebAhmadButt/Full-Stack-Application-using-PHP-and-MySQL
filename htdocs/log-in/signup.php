<?php
// including the database connection file
include_once("..\configuration\configure.php");

if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($sqli, $_POST['name']);
	$email = mysqli_real_escape_string($sqli, $_POST['email']);
	$password = mysqli_real_escape_string($sqli, $_POST['psw']);
	$repeat = mysqli_real_escape_string($sqli, $_POST['psw-repeat']);
	$address = mysqli_real_escape_string($sqli, $_POST['address']);
	// checking empty fields
	if(empty($name) || empty($email) || empty($password) ||empty($repeat)  ) {
			echo "<font color='red'>Some field is missing.</font><br/>";
	}
	elseif ($repeat!=$password){
		echo "<font color='red'>Your both passwords doesn't match.</font><br/>";
	}
	else {
	$ename=(int)$ename;
		//updating the table
		$result = mysqli_query($sqli, "INSERT into customer_table (customer_name,customer_email,customer_password,customer_address) VALUES ('$name','$email','$password','$address');");

		mysqli_close();
		//redirectig to the display page. In our case, it is index.php
		header("Location: customersignin.php");
	}
}
?>
<html>
<head>
	<link rel="stylesheet" href="..\..\css\signup.css">
</head>
<body>

<form action="signup.php" name="signupform" method="post">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
	<label for="NAME"><b>NAME</b></label>
    <input type="text" placeholder="Enter YOUR NAME" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
		<label for="address"><b>
			Enter Your Address Here:</b></label><br>
		<textarea name="address" rows="8" cols="134"></textarea>
    <p>By creating an account you agree to our <font style="color:dodgerblue">  Terms & Privacy.</font></p>
    <div class="clearfix">

      <button type="submit" class="signupbtn" name="submit" value="submit">Sign Up</button>
    </div>
  </div>
</form>
<form class="" action="..\index.php" method="post">
	<button type="submit" class="cancelbtn">Cancel</button>
</form>
</body>
</html>

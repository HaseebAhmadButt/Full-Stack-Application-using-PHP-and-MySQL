<?php
session_start();
// including the database connection file
include_once("..\configuration\configure.php");
	if(isset($_POST['submit'])){
		$email = mysqli_real_escape_string($sqli, $_POST['email']);
		$password = mysqli_real_escape_string($sqli, $_POST['psw']);}
		// checking empty fields
		if(empty($email) || empty($password)) {
			echo "<p>Fill All Fields</p>";
			echo '<script >
			  alert(\"Fields Empty\");
			</script>';
      // header("Location: customersignin.php");
		}
		else {
			//updating the table
			$result = mysqli_query($sqli, "SELECT * FROM customer_table;");
			while($res = mysqli_fetch_array($result)) {
	       if ($res['customer_email']==$email && $res['customer_password']==$password) {
			$_SESSION["log_in"] = $res['customer_id'];
			break;
			}
		}
		mysqli_close();
		if(isset($_SESSION["log_in"]))
		{
			//redirectig to the display page. In our case, it is index.php
			header("Location:..\index.php");
		}
		else {
			echo $_SESSION["log_in"];
			echo "<p>Credentials Not Found. Sign Up to Create Account.</p>";
			echo '<script >
			  alert(\"Credentials Error\");
			</script>';
		}
		}
?>

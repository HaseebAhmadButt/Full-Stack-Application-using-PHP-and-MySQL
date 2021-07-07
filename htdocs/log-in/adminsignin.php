<?php
session_start();
// including the database connection file
include_once("..\configuration\configure.php");
if(isset($_POST['submit'])){
	$email = mysqli_real_escape_string($sqli, $_POST['email']);
	$password = mysqli_real_escape_string($sqli, $_POST['psw']);
	if( empty($email) || empty($password)) {
		echo "<p>Fill all the fields</p>";}
	else {
		$admin_in = NULL;
		$result = mysqli_query($sqli, "SELECT * FROM admin_table");
		while($res = mysqli_fetch_array($result)){
			if ($res['admin_mail']==$email && $res['admin_password']==$password) {
				$_SESSION["admin_in"]=$res['admin_id'];
				break;
			}
		}
	}
	mysqli_close();
	if (isset($_SESSION['admin_in'])) {
		header('Location: ..\files\Admin\admin.php');
	}
	else {
		echo "<font color='red'>Invalid login credentials</font><br/>";
	}
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="..\css\admin_sign_in.css">
</head>
<body>

<h2>Admin Sign In</h2>

<form action="adminsignin.php" method="post">
  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" name="submit">Login</button>

  </div>
</form>

</body>
</html>

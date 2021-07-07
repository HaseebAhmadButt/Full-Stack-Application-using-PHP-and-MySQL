<?php
session_start();
include_once("..\..\configuration\configure.php");
$id = $_GET['id'];
$ses_variable = $_SESSION['log_in'];
$query = "DELETE FROM cart_table WHERE customer_id = $ses_variable AND product_id = $id";
$result = mysqli_query($sqli,$query);
if ($result) {
  header('Location:..\cart\cart.php');
}
else {
  echo "<p>Can't Connect To Database Now. Please Try after Sometime. </p>";
}
?>

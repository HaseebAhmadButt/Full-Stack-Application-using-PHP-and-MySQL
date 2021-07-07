<?php
include_once("..\..\configuration\configure.php");
$id = $_GET['id'];
$query = "DELETE FROM product_table WHERE product_id = $id;";
$result = mysqli_query($sqli, $query);
header("Location: admin.php");
 ?>

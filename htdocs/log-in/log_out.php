<?php
session_start();
// include_once("..\configuration\configure.php");
session_destroy();
header('Location:..\index.php');
 ?>

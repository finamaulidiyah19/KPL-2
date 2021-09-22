<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit;

?>

<!-- Nama  : Fina Maulidiyah N
  	 NIM   : 19051397034
     Prodi : D4 MI 19A -->
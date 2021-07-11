<?php
session_start();
session_unset('username');
setcookie('user',' ',time()-36000,"/");
header('location:../login.php');
?>
<?php
session_start();
session_unset('adminname');
setcookie('admin','admin',time()-36000,"/");
header('location:../admin/3login.php');
?>
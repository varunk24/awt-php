<?php
session_start();
session_unset('docname');
setcookie('doctor',' ',time()-36000,"/");
header('location:../doctor/2login.php');
?>
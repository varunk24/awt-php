<?php
session_start();
require('connect.php');
$msg="";
if(isset($_POST['email']) && isset($_POST['passwd'])){
$email=$_POST['email'];
$passwd=$_POST['passwd'];
$passwd=md5($passwd);

$pasval="SELECT * FROM doctor WHERE email='$email'";
    $passans=mysqli_query($conn,$pasval);
    $passreal=mysqli_fetch_assoc($passans);
    //checking email and password
    if($email!=$passreal['email']){
      $msg="Incorrect Email Address";
    }
    else{
      if($passwd!=$passreal['passwd']){
          $msg="Password is incorrect. Please enter correct password";
      }
      else{
      //submitting  


$log="SELECT * FROM doctor WHERE email='$email' AND passwd='$passwd' and status!=2";
$num=mysqli_query($conn,$log);
if(mysqli_num_rows($num)==1){
  $name=mysqli_fetch_assoc($num);
  $_SESSION['docname']=$name['dname'];
  setcookie('doctor',$name['id'],time()+36000,"/");
  header('location:../doctor/2dashboard.php');
}else{
    header('location:../dcotor/2login.php');  
}
}
}
}
?>
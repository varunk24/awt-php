<?php
session_start();
require('connect.php');
$msg="";
if(isset($_POST['submit'])){
  if(isset($_POST['email']) && isset($_POST['password'])){
    $email=$_POST['email'];
    $passwd=$_POST['password'];
    $passwd=md5($passwd);
    $pasval="SELECT * FROM USERS WHERE email='$email'";
    $passans=mysqli_query($conn,$pasval);
    $passreal=mysqli_fetch_assoc($passans);
    //checking email and password
    if($email!=$passreal['email']){
     $msg="Incorrect email address ";
    }
    else{
      if($passwd!=$passreal['passwd']){
          $msg="Incorrect Password";
      }
      else{
      //submitting  
    $log="SELECT * FROM USERS WHERE email='$email' AND passwd='$passwd' and status!=2";
    $num=mysqli_query($conn,$log);
    if(mysqli_num_rows($num)==1){
      $name=mysqli_fetch_assoc($num);
      $_SESSION['name']=$name['name'];
      setcookie('user',$name['id'],time()+36000,"/");
      header('location:../phpawt/dashboard.php');
    }else{
      header('location:../phpawt/login.php');  
    }
  }
 }
}
}


?>
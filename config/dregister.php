<?php
require('connect.php');
session_start();
$msg="";
$bg="";
//submitting
if(isset($_POST['submit'])){
  if (isset($_POST['email']) && isset($_POST['passwd'])){
    $passwd= $_POST['passwd'];
    $cpasswd=$_POST['cpasswd'];
    $name= mysqli_real_escape_string($conn,$_POST['name']);
    $hname= mysqli_real_escape_string($conn,$_POST['hname']);
    $email= $_POST['email'];
    //length  of password
    if(((strlen($passwd))<6)){
      $msg="Password Length is too short";
      $bg="bg-danger";
    }else{
      //confirming password
      if($passwd!=$cpasswd){
        $msg="Passwords do not match";
        $bg="bg-danger";
      }
      else{
        //checking if email exists
      $cndtn= "SELECT * from doctor WHERE email = '$email' ";
      $res=mysqli_query($conn,$cndtn);
      $num=mysqli_num_rows($res);
      if($num>0){
          $msg="Email already taken";    
          $bg="bg-danger";
      }else{
        //image validation
        //Getting image dimension
    $fileinfo = @getimagesize($_FILES["img"]["tmp_name"]);
    //validating imag
    $docimg= $_FILES['img']['name'];
    $file_extension = pathinfo("$docimg", PATHINFO_EXTENSION);
    if  ($_FILES["img"]["size"] > 2000000) {
        $msg="Image size exceeds 2MB";
        $bg="bg-danger"; 
    }
      //character checking
      if(!preg_match("/^[a-zA-Z-']*$/",$name)){
        $msg="Owner Name Contains Illegal Characters";
        $bg="bg-danger";
    }
    else{
     

    $passwd=md5($passwd);
    $detail=mysqli_real_escape_string($conn,$_POST['detail']);
    $address= mysqli_real_escape_string($conn,$_POST['address']);

    $target="../uploads/".basename($_FILES['img']['name']);

 
    $mainq="INSERT INTO doctor (dname,hname,email,passwd,details,addrs,doc_img) values ('$name','$hname','$email','$passwd','$detail','$address','$docimg')";
        mysqli_query($conn,$mainq) or die("connection failed".mysqli_error($conn));
        move_uploaded_file($_FILES['img']['tmp_name'],$target);
        
        $cndtn1= "SELECT * from doctor WHERE email = '$email' ";
        $res1=mysqli_query($conn,$cndtn1);
        $det=mysqli_fetch_assoc($res1);
        $_SESSION['docname']=$name;
        setcookie('doctor',$det['id'],time()+36000,"/");
        header('location:../doctor/2dashboard.php'); 
}
}
}
}
}
}

?>
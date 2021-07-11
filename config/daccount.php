<?php
require('connect.php');
$did=$_COOKIE['doctor'];
$msg="";
$error="";
$bg="";
$docimg="";
$quer="SELECT * FROM doctor WHERE id='$did' ";
if($res=mysqli_query($conn,$quer)){
   $data=mysqli_fetch_assoc($res);
   $id=$data['id'];
}

if(isset($_POST['submit'])){
      $name= $_POST['name'];
      $hname= $_POST['hname'];
      $email= $_POST['email'];
      $detail=$_POST['detail'];
      $address= $_POST['address'];
      $docimg= $_FILES['img']['name'];
      $num=0;
      if($data['email']!=$email){
       $cndtn= "SELECT * from shop WHERE email = '$email' ";
       $res1=mysqli_query($conn,$cndtn);
       $num=mysqli_num_rows($res1);
      }

      if($num>0){
      
            $msg="Email already taken";    
            $bg="bg-danger";
           
      }
      else{
        //image validation
        //Getting image dimension
    $fileinfo = @getimagesize($_FILES["img"]["tmp_name"]);
    $file_extension = pathinfo("$shopimg", PATHINFO_EXTENSION);
    if  ($_FILES["img"]["size"] > 2000000) {
        $msg="Image size exceeds 2MB";
        $bg="bg-danger"; 
    }
    else{
    
      if($docimg!=""){
            $target="../uploads/".basename($_FILES['img']['name']);
            $mainq="UPDATE doctor SET dname='$name' ,hname='$hname',email='$email',details='$detail',addrs='$address',doc_img='$docimg' WHERE id='$id'";
      }else{
            $mainq="UPDATE doctor SET dname='$name' ,hname='$hname',email='$email',details='$detail',addrs='$address' WHERE id='$id'";
      } 
      mysqli_query($conn,$mainq) or die("connection failed".mysqli_error($conn));
      move_uploaded_file($_FILES['img']['tmp_name'],$target);
      $_SESSION['docname']=$name;
      header('location:../doctor/2account.php');       
}  
  
}


}

?>
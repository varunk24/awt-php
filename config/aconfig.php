<?php
require("connect.php");
$quer="SELECT * FROM users ";
$no=mysqli_query($conn,$quer);
$unum=mysqli_num_rows($no);

//registered shops
$quer2="SELECT status FROM doctor";
$no2=mysqli_query($conn,$quer2);
$snum=mysqli_num_rows($no2);



//manageshop
//display shop
$quer3="SELECT * FROM doctor WHERE status!=2";
$no3=mysqli_query($conn,$quer3);
$det= mysqli_fetch_all($no3,MYSQLI_ASSOC);
mysqli_free_result($no3);

//view details
 if(isset($_POST['disable'])){
     $id=$_POST['id'];
    $quer4="UPDATE doctor SET status='2' where id='$id'";
    mysqli_query($conn,$quer4);
    header('location:./3mgdoctor.php');
   
 }

//doctordisplay
$dquer="SELECT * FROM doctor";
$dres=mysqli_query($conn,$dquer);
$ddisp=mysqli_fetch_all($dres,MYSQLI_ASSOC);
mysqli_free_result($dres);

//doctordisable
if(isset($_POST['ddisable'])){
  $did=$_POST['did'];
  $ddisquer="UPDATE doctor SET status='2' where id='$did'";
  mysqli_query($conn,$ddisquer);
  header('location:./3mgdoctor.php');
}

//doctor enable
if(isset($_POST['denable'])){
  $did=$_POST['did'];
  $ddisquer1="UPDATE doctor SET status='1' where id='$did'";
  mysqli_query($conn,$ddisquer1);
  header('location:./3mgdoctor.php');

}

//doctor delete
if(isset($_POST['ddelete'])){
  $did=$_POST['did'];
  $ddisquer2="DELETE FROM doctor where id='$did'";
  mysqli_query($conn,$ddisquer2);
  header('location:./3mgdoctor.php');
}




//userdisplay
$userquer="SELECT * FROM users";
$ures=mysqli_query($conn,$userquer);
$udisp=mysqli_fetch_all($ures,MYSQLI_ASSOC);
mysqli_free_result($ures);

//userdisable
if(isset($_POST['udisable'])){
  $uid=$_POST['uid'];
  $userdisquer="UPDATE users SET status='2' where id='$uid'";
  mysqli_query($conn,$userdisquer);
  header('location:./3mguser.php');
}

//user enable
if(isset($_POST['uenable'])){
  $uid=$_POST['uid'];
  $userdisquer1="UPDATE users SET status='1' where id='$uid'";
  mysqli_query($conn,$userdisquer1);
  header('location:./3mguser.php');
}

//user delete
if(isset($_POST['udelete'])){
  $uid=$_POST['uid'];
  $userdisquer2="DELETE FROM users where id='$uid'";
  mysqli_query($conn,$userdisquer2);
  header('location:./3mguser.php');
}


//admin display
$adminquer="SELECT * FROM admin";
$ares=mysqli_query($conn,$adminquer);
$adisp=mysqli_fetch_all($ares,MYSQLI_ASSOC);
mysqli_free_result($ares);

//adminpersonal
$apquer="SELECT * FROM admin WHERE id={$_COOKIE['admin']}";
$apres=mysqli_query($conn,$apquer);
$apdisp=mysqli_fetch_assoc($apres);

//admindisable
if(isset($_POST['adisable'])){
  $aid=$_POST['aid'];
  $admindisquer="UPDATE admin SET status='2' where id='$aid'";
  mysqli_query($conn,$admindisquer);
  header('location:./3mgadmin.php');
}
//adminenable
if(isset($_POST['aenable'])){
  $aid=$_POST['aid'];
  $admindisquer1="UPDATE admin SET status='1' where id='$aid'";
  mysqli_query($conn,$admindisquer1);
  header('location:./3mgadmin.php');
}

//add admin
$amsg="";
$bg="";
if(isset($_POST['add'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $convp=$_POST['passwd'];
    $cpasswd=$_POST['cpasswd'];
    //length  of password
    if(((strlen($convp))<6)){
        $amsg="Password Length is too short";
        $bg="bg-danger";
      }else{
        //confirming password
        if($convp!=$cpasswd){
          $amsg="Passwords do not match";
          $bg="bg-danger";
        }
        else{
          //checking if email exists
        $cndtn= "SELECT * from admin WHERE email = '$email' ";
        $res=mysqli_query($conn,$cndtn);
        $num=mysqli_num_rows($res);
        if($num>0){
            $amsg="Email already taken";    
            $bg="bg-danger";
        }else{
            //validating name
            if(!preg_match("/^[a-zA-Z-']*$/",$name)){
                $amsg="Name Contains Illegal Characters";
                $bg="bg-danger";
            }
            else{
    $passwd=md5($convp);
    $addquer="INSERT INTO admin (name,email,passwd) VALUES('$name','$email','$passwd')";
    mysqli_query($conn,$addquer);
    header('location:../admin/3dashboard.php');
}
}
}
}
}

?>
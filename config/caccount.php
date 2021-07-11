<?php
require('connect.php');
$id=$_COOKIE['user'];
$quer="SELECT * FROM USERS WHERE id= '$id' ";
$res=mysqli_query($conn,$quer);
$data=mysqli_fetch_assoc($res);

if(isset($_POST['submit'])){    
    $name=$_POST['fname'];
    $_SESSION['name']=$name;
    $pno=$_POST['phn'];
    $adr=$_POST['address'];
    $updt="UPDATE USERS set name='$name', phno='$pno',addr='$adr' WHERE id ='$id'";
    mysqli_query($conn,$updt);
    header('location:../phpawt/1account.php');
}
if(isset($_POST['passwd'])){
    header('location:../phpawt/1forgot.php');
}
$hey="";
if(isset($_POST['changepass'])){
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $cnfrmpass=$_POST['cnfrmpass'];
    if(strlen($newpass)<7){
        $hey="Minimum password length should be 8 characters";
    }
    else{
    $cnfrmquer="SELECT passwd from USERS WHERE id='$id' ";
    $check=mysqli_query($conn,$cnfrmquer);
    $oldpass=md5($oldpass);
    $pass=mysqli_fetch_assoc($check);
    $newpass=md5($newpass);
    $cnfrmpass=md5($cnfrmpass);
    if($oldpass==$pass['passwd']&&$newpass==$cnfrmpass){
        $updtpass="UPDATE USERS set passwd='$cnfrmpass' WHERE id ='$id'";
        mysqli_query($conn,$updtpass);
        header('location:../phpawt/dashboard.php');
    }
    elseif($oldpass!=$pass['passwd']){
        $hey="Please Confirm Your Old Password";
    }
    elseif($newpass!=$cnfrmpass){
        $hey="Please Confirm Your New Password";
    }
}
}


    
?>
<?php
require('connect.php');
$doc_id=$_COOKIE['doctor'];
$apt_id=$_GET['id'];


//prescription
$prlist="SELECT u.name,u.phno,a.id,a.descp,a.time,a.date,a.bkng_time,a.user_id FROM users as u,appointment as a WHERE a.doc_id='$doc_id' and a.status=3 and u.id=a.user_id";
if($result3=mysqli_query($conn,$prlist)){
    $pres=mysqli_fetch_all($result3,MYSQLI_ASSOC);
    mysqli_free_result($result3);
}


if(isset($_POST['back'])){
    header("location:../doctor/2ongappointment.php");
}

if(isset($_POST['add'])){
    $pid=$_POST['id'];
    $uid=$_POST['uid'];
    $decp=$_POST['prescrptn'];
    $pquery="UPDATE appointment SET status=4 WHERE id={$pid}";
    mysqli_query($conn,$pquery);
    $newquery="INSERT into prescription (user_id,doc_id,apt_id,descpt) values ('$uid','$doc_id','$pid','$decp')";
    mysqli_query($conn,$newquery);
    header("location:../doctor/2ongappointment.php");
}




?>
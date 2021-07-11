<?php
require('connect.php');
$doc_id=$_COOKIE['doctor'];


//prescription
$hlist="SELECT u.name,u.phno,a.id,a.descp,a.time,a.date,a.bkng_time,p.descpt FROM users as u,appointment as a,prescription as p WHERE a.doc_id='$doc_id' and a.status=4 and u.id=a.user_id and p.apt_id=a.id";
if($result=mysqli_query($conn,$hlist)){
    $hres=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
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
    $newquery="INSERT into prescription (user_id,doc_id,apt_id,descp) values ('$uid','$doc_id','$pid','$decp')";
    mysqli_query($conn,$newquery);
    header("location:../doctor/2ongappointment.php");
}




?>
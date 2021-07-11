<?php
require('connect.php');
$doc_id=$_COOKIE['doctor'];
//new appointment
$aptlist="SELECT u.name,u.phno,a.id,a.descp,a.time,a.date,a.bkng_time FROM users as u,appointment as a WHERE a.doc_id='$doc_id' and a.status=1 and u.id=a.user_id";
if($result=mysqli_query($conn,$aptlist)){
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
}


if(isset($_POST['accept'])){
    $updateid=$_POST['updateid'];
    $upquery="UPDATE appointment SET status=2 WHERE id={$updateid}";
    mysqli_query($conn,$upquery);
    header("location:../doctor/2newappointment.php");
}


if(isset($_POST['delete'])){
    $updateid=$_POST['updateid'];
    $delquery="DELETE from appointment where id={$updateid}";
    mysqli_query($conn,$delquery);
    header("location:../doctor/2newappointment.php");
}


//accepted apppointment

$acptlist="SELECT u.name,u.phno,a.id,a.descp,a.time,a.date,a.bkng_time FROM users as u,appointment as a WHERE a.doc_id='$doc_id' and a.status=2 and u.id=a.user_id";
if($result1=mysqli_query($conn,$acptlist)){
    $accept=mysqli_fetch_all($result1,MYSQLI_ASSOC);
    mysqli_free_result($result1);
}

if(isset($_POST['engage'])){
    $engid=$_POST['engid'];
    $query1="UPDATE appointment SET status=3 WHERE id={$engid}";
    mysqli_query($conn,$query1);
    header("location:../doctor/2apappointment.php");
}


//Ongoing apppointment

$atlist="SELECT u.name,u.phno,a.id,a.descp,a.time,a.date,a.bkng_time FROM users as u,appointment as a WHERE a.doc_id='$doc_id' and a.status=3 and u.id=a.user_id";
if($result2=mysqli_query($conn,$atlist)){
    $ongng=mysqli_fetch_all($result2,MYSQLI_ASSOC);
    mysqli_free_result($result2);
}

if(isset($_POST['prescp'])){
    header("location:../doctor/2prescription.php?id={$_POST['id']}");

}



?>
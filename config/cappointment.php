<?php
require('connect.php');
//info
$doc_id=mysqli_real_escape_string($conn,$_GET['id']);
$getlist="SELECT * FROM doctor WHERE id={$doc_id}";
$result=mysqli_query($conn,$getlist);
$details=mysqli_fetch_assoc($result);
mysqli_free_result($result);

//canceliing
if(isset($_POST['cancel'])){
    header('location:../phpawt/1doctor.php');
}
//submitting 
if (isset($_POST['submit'])){
         $user_id= $_COOKIE['user'];
         $time=$_POST['time'];
         $date=$_POST['date'];
         $descp=$_POST['issues'];         
         $add="INSERT INTO appointment(user_id,doc_id,descp,time,date) values ('$user_id','$doc_id','$descp','$time','$date')";
        mysqli_query($conn,$add) or die("connection failed".mysqli_error($conn));
        header("location:../phpawt/1doctor.php"); 
}

?>
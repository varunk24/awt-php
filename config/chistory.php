<?php
require('connect.php');
$user_id=$_COOKIE['user'];
$aptlist="SELECT a.id,a.time,a.date,a.status,d.dname,d.hname FROM appointment a,doctor d where a.user_id='$user_id' and d.id=a.doc_id and a.status = 4";
if($result=mysqli_query($conn,$aptlist)){
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $no=mysqli_num_rows($result);
    mysqli_free_result($result);
}

if(isset($_POST['view'])){
    $view_id=$_POST['aptid'];
    header("location:../phpawt/1prescription.php?id={$view_id}");
}


?>
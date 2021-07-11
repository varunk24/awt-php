<?php
require('connect.php');
$user_id=$_COOKIE['user'];
$aptlist="SELECT a.id,a.time,a.date,a.status,d.dname,d.hname FROM appointment a,doctor d where a.user_id='$user_id' and d.id=a.doc_id and a.status < 4";
if($result=mysqli_query($conn,$aptlist)){
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $no=mysqli_num_rows($result);
    mysqli_free_result($result);
}

if(isset($_POST['delete'])){
    $delete_id=$_POST['aptid'];
    $query="DELETE from appointment where id={$delete_id}";
    if(mysqli_query($conn,$query)){
        header('location:../phpawt/1appointment.php');
    }    
}


?>
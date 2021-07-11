<?php
require('connect.php');
$a_id=$_GET['id'];
$aptlist="SELECT a.id,a.time,a.date,a.status,d.dname,d.hname,p.descpt FROM appointment a,doctor d,prescription p where a.id='$a_id' and d.id=a.doc_id and a.status = 4 and p.apt_id={$a_id}";
if($result=mysqli_query($conn,$aptlist)){
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $no=mysqli_num_rows($result);
    mysqli_free_result($result);
}


?>
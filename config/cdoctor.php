<?php
require('connect.php');
$query="SELECT * from doctor WHERE status!=2 ORDER BY status DESC";
$ans=mysqli_query($conn,$query);
$displ=mysqli_fetch_all($ans,MYSQLI_ASSOC);
?>
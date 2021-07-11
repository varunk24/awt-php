<?php
session_start();
if(!isset($_COOKIE['admin'])){
  header('location:./3login.php');
}
require('../config/aconfig.php')
?>
<!DOCTYPE html>
<html>
<title>Doc Plus</title>
<link rel="icon" href="../icon/icons.png" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../style/w3.css">
<link rel="stylesheet" href="../bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right" style="font-family: 'Pacifico', cursive; font-size:30px; color:#d2996e;">Doc Plus</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-bar s12">
      <!--<img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">-->
   
    <div class="w3-col s8 w3-bar" style="font-size:20px;">
      <span>Welcome, <strong> <?php echo $_SESSION['adminname']; ?> </strong></span><br>
      <div class="w3-col s8 w3-bar" style="font-size:20px;">
      <a href="../config/alogout.php" class=" btn btn-primary"><i class="fa fa-sign-out">Sign Out</i></a>
    </div>
    </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h4>Admin Dashboard</h4>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="3dashboard.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-home fa-fw"></i> Home </a>
    <a href="3addadmin.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Add Admins</a>
    <h6 class="w3-bar-item w3-padding"><span>Management</span></h6>
    <a href="3mgdoctor.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-users fa-fw"></i> Manage Doctors </a>
    <a href="3mguser.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i> User Management</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:60px;">

  <!-- Header -->
  <header class="w3-container w3-center" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Add Admin</b></h5>
  </header>
  
  <div class="container-xl" style="width:60%">
  <form  method="POST" enctype="multipart/form-data" style="color: black;">
  <div class="form-group <?php echo $bg; ?> ">
      <label class="text-white"><?php echo $amsg ; ?> </label>
   </div>
  <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name"  required>
  </div>  
    <div class="form-group">  
      <label for="emailid">Email</label>
      <input type="email" class="form-control" name="email" id="emailid" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="passwd" id="password" required>
    </div>
    <div class="form-group">
      <label for="cpassword" class="col-form-label">Confirm Password </label>
      <input type="password" class="form-control" id="cpassword" name="cpasswd" required>
    </div>
    <br>
  <button type="submit" value="add" name="add"  class="btn btn-success">Add</button>
 </form>
</div>

<br>
<br>
<br>
<br>
<br>
<br>

  <!-- Footer -->
  
  <footer class="w3-container w3-padding-16 w3-light-grey text-center">
 
    <p> Doc Plus &copy;2021</p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

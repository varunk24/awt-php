<?php
session_start();
if(!isset($_COOKIE['doctor'])){
  header('location:./2login.php');
}
require('../config/daccount.php');
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
      <h4><span>Hello Dr. <?php echo $_SESSION['docname']; ?></span></h4>
    <div class="w3-col s8 w3-bar" style="font-size:20px;">
      <a href="../config/dlogout.php" class="w3-bar-item w3-button btn btn-outline-primary"><i class="fa fa-sign-out">Sign Out</i></a>
    </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h4>Doc Plus</h4>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="2dashboard.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-home fa-fw"></i> Home</a>
    <a href="2account.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>Profile</a>
    <h6 class="w3-bar-item w3-padding"><span>Manage Appointments</span></h6>
    <a href="2newappointment.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  New Requests</a>
    <a href="2apappointment.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Approved Appointments</a>
    <a href="2ongappointment.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i> Ongoing Appointments</a>
    <a href="2history.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  History</a>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:60px;">

  <!-- Header -->
  <header class="w3-container" style="margin:auto; padding-top:22px">
    <h2><b><i class="fa fa-user"></i> Edit Profile</b></h2>
  </header>
  <div class="w3-container"  style="margin-left:35px" >
  <div class="col-md-9" style="margin:auto; font-weight:bold; font-size:18px; float:left;">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" style="color: black;">
  <div class="form-group <?php echo $bg; ?> ">
      <label class="text-white"><?php echo $msg ; ?> </label>
   </div>
  <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name"  value="<?php echo $data['dname']; ?>">
  </div>  
  <div class="form-group">
      <label for="oname">Hosital name</label>
      <input type="text" class="form-control" name="hname" id="hname"  value="<?php echo $data['hname']; ?>">
    </div>
    <div class="form-group">  
      <label for="emailid">Email</label>
      <input type="email" class="form-control" name="email" id="emailid" value="<?php echo $data['email']; ?>">
    </div>
    <div class="form-group ">
      <label for="detail">Details</label>
      <input type="text" class="form-control"  name="detail" value="<?php echo $data['details']; ?>">
    </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <textarea class="form-control" name="address" id="Address" ><?php echo $data['addrs']; ?></textarea>
  </div>
  <br>
  <div class="form-group">
  <?php echo "<img src='../uploads/". $data['doc_img']." ' style='display: block;max-width:180px;max-height:180px;width: auto;height: auto;'>"; ?>
</div>  <br>
  <div class="form-row " >
  <label for="image">Profile Image</label>
  </div>
    <div class="form-group col-md-6" style="background-color:white;padding:0%;">      
      <input type="file" id="image" name="img" >   
  </div>  <br>
  <button type="submit" value="submit" name="submit"  class="btn btn-primary btn-test">Update</button>
 </form>
 </div>
 </div>
  


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

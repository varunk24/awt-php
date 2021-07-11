<?php
if(isset($_COOKIE['doctor'])){
  header('location:./2dashboard.php');
}
require('../config/dregister.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Plus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="icon/icons.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="navbar-brand " style="font-family: 'Pacifico', cursive; font-size:50px; color:#d2996e;">Doc Plus</div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <a class="nav-link" href="../login.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="2login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login.php">User Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../admin/3login.php">Admin Login</a>
            </li>
          </ul>
          </ul>
        </div>
    </nav>
  </header>
  <section>
  <div style="margin:auto; margin-top:3%; padding:5% 7%; width: 60%; background-color:#fff5; border-radius:50px;">
  <form method="POST" enctype="multipart/form-data" style="color: black;">
  <h1 style="font-family: 'Pacifico', cursive; font-size:50px; color:#000; text-align:center">Doctor Register</h1>
  <br>
  <div class="form-group <?php echo $bg; ?> ">
      <label class="text-white"><?php echo $msg ; ?> </label>
   </div>
  <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name"  required>
  </div>  
  <div class="form-group">
      <label for="oname">Hospital name</label>
      <input type="text" class="form-control" name="hname" id="oname"  required>
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
    <div class="form-group ">
      <label for="detail">Details</label>
      <input type="text" class="form-control"  name="detail" required>
    </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <textarea class="form-control" name="address" id="Address" required></textarea>
  </div>
  <div class="form-row " >
  <label for="image">Profile Image</label>
  </div>
    <div class="form-group col-md-6" style="background-color:white;padding:0%;">      
      <input type="file" id="image" name="img" required>   
  </div>  
  <button type="submit" value="submit" name="submit"  class="btn btn-primary btn-test">Sign Up</button>
 </form>
 </div>
</section>
<div style="padding: 20px;"></div>

<footer>
<p class="text-center">Doc Plus &copy;2021</p>
</footer> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
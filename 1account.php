<?php 
session_start();
if(!isset($_COOKIE['user'])){
  header('location:login.php');
}
require('config/caccount.php');

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
   <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="navbar-brand " style="font-family: 'Pacifico', cursive; font-size:50px; color:#d2996e;">Cake Studio</div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item btn-primary ">
              <a class="nav-link" href="config/clogout.php">Sign Out</a>
            </li>
          </ul>
        </div>
        </div>
        </nav>
  </header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <ul class="nav justify-content-center" style="margin: auto;">
  <li class="nav-item">
    <a class="nav-link active" href="dashboard.php">Home</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="1doctor.php">Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="1appointment.php">Appointments</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="1account.php?">My Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="1history.php">History</a>
  </li>
</ul>
  </nav>

  <div style="margin:auto; margin-top:3%; padding:5% 7%; width: 60%; background-color:grey; border-radius:50px;">
  <form  method="POST" style="color: black;box-sizing: border-box;">
  <h2 style=" font-size:50px; color:#000; text-align:center">My Account</h2>
  <div class="form-group">
      <span id="hide" style="color: red;"></span>
   </div>
  <div class="form-group">
      <label for="firstname">Name</label>
      <input type="text" class="form-control" name="fname"  value="<?php echo $data['name']; ?>"  >
  </div>  
    <div class="form-group ">
      <label for="phone">Phone Number</label>
      <input type="number" class="form-control"  name="phn" value="<?php echo $data['phno']; ?>">
    </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <textarea class="form-control" name="address"><?php echo $data['addr']; ?></textarea>
  </div>    
  <button type="submit" value="submit" name="submit" class="btn btn-success ">Save</button>
  <div class="float-right">
  <button type="submit" value="passwd" name="passwd" class="btn btn-primary">Change Password</button>
  </div>
 </form>
 </div>
 <footer>
<p class="text-center">Doc Plus&copy;2021</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
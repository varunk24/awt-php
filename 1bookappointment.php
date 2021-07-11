<?php 
session_start();
if(!isset($_COOKIE['user'])){
    header('location:login.php');
}
require('config/cappointment.php');

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

  <div class="w3-container"  style="margin:auto; " >
  <div id="items" style="margin:3%;min-width:70%;border:solid 2px ;border-radius:10px;padding:20px; ">
        <h1>Dr. <?php echo $details['dname'] ; ?></h1><br><br>
        <h2>Hospital Name</h2>
        <label><?php echo $details['hname']; ?></label>
    
      <!-- form submission -->
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <h3>Issues</h3>
        <textarea class="form-control col-8" name="issues" rows="3"></textarea>
        </div>
        <div class="form-group" style="width:10%;">
        <h3>Time Slot</h3>
        <select class="form-control" id="quantityFormControlSelect1" name="time">
        <option value="9">9-11</option>
        <option value="11">11-1</option>
        <option value="2">2-4</option>
        <option value="4">4-6</option>
        </select>
        </div>
        <div class="form-group">
        <h3>Date</h3>
        <input type="date" name="date">
        </div>
        <input type="hidden" name="docid" value="<?php echo $details['id']; ?>">
        <br>
        <button class="btn btn-primary" type="submit" value="submit" name="submit" >Book</button>
        <button class="btn btn-primary" type="submit" value="cancel" name="cancel" >Cancel</button>
        </form>
       
    </div>
 
 </div>



  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
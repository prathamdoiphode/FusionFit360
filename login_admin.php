<?php
session_start();
  include 'connect.php';
  
  

  if(isset($_POST['submit'])){
     $mail = $_POST['email'];
     $password =  $_POST['password'];
      $sql = "SELECT password from fusionfit360.Admin where email = :e";
      // $password = md5($_POST['password']);
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(":e",$_POST['email']);
      $stmt->execute();
      //----------------------------------------
      if($stmt->rowCount() > 0){
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $getting = $row['password'];
        // echo "$getting";
        if($getting == $password){
          $_SESSION['logged_in'] = true;
          $_SESSION['email'] = $mail;
          $_SESSION['password'] = $password;
          header("Location: http://localhost/fusionfit360/adminpage.php");
        }
        
      }

      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        // Redirect to the admin page if already logged in
        header("Location: http://localhost/fusionfit360/adminpage.php");
        exit();
    }
      
      echo '<span style = "color : red">Input credential invalid</span>';
      
  }
?>


<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<link rel="stylesheet" href="login.css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
  body {
    background-image: url('images/bg1.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    color: #3a3c47;
  }
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-transparent" id="navbar">
  <div class="container-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link " aria-current="page" href="index.php"> <button class="btn" style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;color: white;">Home</button></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="team.html">
            <button class="btn" style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;color: white;">Our Team</button>
          </a>
        </li>
        <!-- <li class="nav-item ">
          <a class="nav-link " href="#">
            <button class="btn">Gallery</button>
          </a>
        </li> -->
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
            <button class="btn" style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;color: white;">Department</button>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item " href="gym.php">Gym</a></li>
            <li><a class="dropdown-item " href="yoga.php">Yoga</a></li>
            <li><a class="dropdown-item " href="diet.php">Diet</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
</div>


<br><br><br>
<form method="post" action=""  style="text-align: center; margin-top: 8px;">

<h1> Admin Sign In</h1>
<br>
<div class="row Signup">
<input type="email" name="email" placeholder="email id" required="required">
</div>
<div class="row Signup">
<input type="Password" id="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="must content atleast 1 upper & 1 lower character and 1 number & 1 special character, min length : 8" name="password" placeholder="password" required="required">
</div>
                                              
<div style="display: flex;">
  <div style="padding-left: 5%; margin-top: 1rem;">
    <input id="submit" type="submit" name="submit" value="Sign In"  class="button">
  </div>
  
  <div style="padding-left: 30%; margin-top: 1rem;">
    <input id="reset" type="reset" name="reset" value="Reset"  class="button">
  </div>
</div>
<br>



<p style="color: black; margin-top: 6%;">For Sign Up &nbsp;
<a href="registration.php" class="sign">Click Here</a>

</p>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
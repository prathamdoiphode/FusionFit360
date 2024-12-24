<!DOCTYPE html>
<html>

<head>
  <title>Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <link rel="stylesheet" href="registration.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-transparent" id="navbar">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link " aria-current="page" href="index.php"> <button class="btn" style="text-shadow: #FC0 1px 0 10px; color: white;">Home</button></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="team.html">
              <button class="btn" style="text-shadow: #FC0 1px 0 10px; color: white;">Our Team</button>
            </a>
          </li>
          <!-- <li class="nav-item ">
          <a class="nav-link " href="#">
            <button class="btn">Gallery</button>
          </a>
        </li> -->
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
              <button class="btn" style="text-shadow: #FC0 1px 0 10px; color: white;">Department</button>
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

  <br>
  <form method="post" action="" style="text-align: center; margin-top: 9px;">

    <h2> User Sign Up</h2>
    <div class="row Signup">
      <input type="text" name="cid" placeholder="user id (C01)" required="required"
        title="first character must be C ">
    </div>
    <div class="row Signup">
      <input type="text" name="fname" placeholder="first name" required="required">
    </div>
    <div class="row Signup">
      <input type="text" name="lname" placeholder="last name" required="required">
    </div>
    <div class="row Signup">
      <select name="gender" placeholder="cars">
        <option value="M">Male</option>
        <option value="F">Female</option>
      </select>
    </div>
    <div class="row Signup">
      <input type="number" name="height" min="100" placeholder="height (in cm)" required="required">
    </div>
    <div class="row Signup">
      <input type="number" name="weight" min="30" placeholder="weight (in kg)" required="required">
    </div>
    <div class="row Signup">
      <input type="number" name="age" min="15" placeholder="age" required="required">
    </div>
    <div class="row Signup">
      <input type="tel" name="mob" pattern="^\d{10}$" placeholder="mobile no." required="required">
    </div>
    <div class="row Signup">
      <input type="email" name="email" placeholder="email id" required="required">
    </div>
    <div class="row Signup">
      <input type="Password" id="pass"
        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$"
        title="must content atleast 1 upper & 1 lower character and 1 number & 1 special character, min length : 8"
        name="password" placeholder="password" required="required">
    </div>

    <div style="display: flex;">
      <div style="padding-left: 5%;">
        <input id="submit" type="submit" name="submit" value="Sign Up" class="button">
      </div>
      <div style="padding-left: 35%;">
        <input id="reset" type="reset" name="reset" value="Reset" class="button">
      </div>
    </div>
    <?php
    include 'connect.php';
    if (isset($_POST['submit'])) {
      $cid = $_POST['cid'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $gender = $_POST['gender'];
      $age = $_POST['age'];
      $height = $_POST['height'];
      $weight = $_POST['weight'];
      $mob = $_POST['mob'];
      $mail = $_POST['email'];
      $password =  $_POST['password'];

      $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
      //----------------------------------------------
      $sql = "SELECT * from fusionfit360.Customer where Log_id = :e";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(":e", $_POST['email']);
      $stmt->execute();
      //----------------------------------------
      $sql2 = "SELECT * from fusionfit360.Customer where Cid = :e";
      $stmt2 = $conn->prepare($sql2);
      $stmt2->bindParam(":e", $cid);
      $stmt2->execute();
      //-----------------------------------------
      if ($stmt2->rowCount() > 0) {
        echo '<span style = "color : red">User id already exists.</span>';
      } else if ($stmt->rowCount() == 0) {
        $str = "INSERT INTO fusionfit360.Customer  VALUES ('$cid','$fname','$lname','$gender','$age','$height','$weight','$mob','$mail','$hashedPassword')";
        // $str =  "INSERT INTO FitnessPortal.Register  VALUES ('$mail','$password')";
        $stmt2 = $conn->prepare($str);
        $stmt2->execute();
        echo '<span style = "color : green">Registered sucessfully!</span>';
      } else {
        echo '<span style = "color : red">Already registered!</span>';
      }
      // commit the transaction
      // $conn = null;


      //-----------TO Go new Page------------------
      // header("Location: http://localhost/Navin212123033/lab6/delete.php");   
    }
    ?>


    <p style="color: black; margin-top: 6%;">For Admin Login &nbsp;
      <a href="login_admin.php" class="sign">Click Here</a>
    </p>
    <p style="color: black; margin-top: 6%;">For User Login &nbsp;
      <a href="login_user.php" class="sign">Click Here</a>
    </p>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
	<title>Gym Department</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- <link rel="stylesheet" type="text/css" href="admin_department.css"> -->
</head>
<body onload="slider()" style=" height: 100%;
    overflow-y: auto; margin: 0;">
<div class="banner" >
  <div class="slider" >
      <img src="images/gym_bg.jpg" id="slideImg">
  </div>
  <div class="overlay"> 
    <div id="navdiv">
    <nav class="navbar navbar-expand-lg bg-transparent" id="navbar">
  <div class="container-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link " aria-current="page" href="index.php"> <button class="btn" style="text-shadow: #FC0 1px 0 10px;">Home</button></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="team.html">
            <button class="btn" style="text-shadow: #FC0 1px 0 10px;">Our Team</button>
          </a>
        </li>
        <!-- <li class="nav-item ">
          <a class="nav-link " href="#">
            <button class="btn" style="text-shadow: #FC0 1px 0 10px;">Gallery</button>
          </a>
        </li> -->
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
            <button class="btn" style="text-shadow: #FC0 1px 0 10px;">Department</button>
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
</div><br><br>
  <div style="display: flex;margin: 40px 0 0 0;">
  	<div style="margin-right: 20%;">
  		<!-- <h2 style="color:white;">Gym Overview </h2><br> -->
	  	<p style="color:white; text-align: center; margin-left: 20rem; text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;">
    Dedicated space equipped with various exercise machines, weights and fitness tools designed to help people improve their strength, endurance and overall health. Gym offers a range of facilities, including cardio equipment, weightlifting areas, group fitness classes and personal training services. It provides an environment for individuals of all fitness levels to work on their wellness goals. whether through strength training, cardiovascular exercises or guided classes.
	  	</p>
  	</div>
  	<!-- <div id="logo" style="margin-top:0%;">
        <img src="images/logo1.png" style="height: 233px; width: 250px; border-radius : 50%;">
    </div> -->
  </div>
  <br>

  <!-- <br><br><br> -->
  <?php
  	echo '
  	<form style="text-align: center; color:white;" action="" method="post">
	    <input type = "radio" value = "fee" name = "query"> Show Fee Structure </input> &nbsp; &nbsp;
	    <input type = "radio" value = "facility" name = "query"> Show Facilities </input> 
	    <br><br>
	    <input class="favorite styled" type = "submit" value = "Submit" name = "submit"/> <br><br>
    </form>';
    if(isset($_POST['submit'])){
        $query = $_POST['query'];
        if($query == "fee"){
            //echo "showing";
            class TableRows extends RecursiveIteratorIterator {
              function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
              }

              function current() {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
              }

              function beginChildren() {
                echo "<tr>";
              }

              function endChildren() {
                echo "</tr>" . "\n";
              }
            } 
            // echo "<h1>$email</h1>";

            $servername = "localhost";
            $port_no = 3307; // Port number for Windows 
            $username = "root";
            $password = "";
            $dbname = "fusionfit360";
            try {
              $conn = new PDO("mysql:host=$servername;port=$port_no;dbname=$dbname", $username, $password);
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // begin the transaction
              $conn->beginTransaction();
              
              //----------------------------------------
              $stmt = $conn->query("SELECT fee FROM fusionfit360.Department where did = 1");
              $row=$stmt->fetch(PDO::FETCH_ASSOC);
              $fee =  $row['fee'];
              // echo $fee;
              echo '<table border="1" id="table" overflow-y: auto; max-height: 100vh;>',"\n";
            	echo "<tr> <th style='width:20%;'> SNo </th><th style='width:35%;'> Fee </th> <th style='width:45%;'>Month(s)</th> </tr>";
            	$count=1;
               for($i=1; $i<=12;) {
                    echo "<tr> <td>";
                    echo $count;
                    echo "</td><td>";
                    $cuf = $fee*$i;
                    if($i == 3){
                    	$cuf -= 500;
                    }
                    else if ($i == 6) {
                    	$cuf -= 2000; 
                    }
                    else if ($i == 12) {
                    	$cuf -= 5000;
                    }
                    echo $cuf;
                    echo "</td><td>";
                    echo "$i  ";
                    echo "</td></tr>";
                    $count++;
                    if($i==1){
                    	$i =$i*3;
                    }else{
                    	$i = $i*2;
                    }
                }
                echo    "</table>";


            // commit the transaction
            $conn->commit();
  
            }
            catch(PDOException $e) {
              // roll back the transaction if something failed
              $conn->rollback();
              echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }

        //-------------------------------------------------TO DELETE DATA-------------------------------------------------------
    	if($query == "facility"){
            //echo "showing";
            class TableRows extends RecursiveIteratorIterator {
              function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
              }

              function current() {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
              }

              function beginChildren() {
                echo "<tr>";
              }

              function endChildren() {
                echo "</tr>" . "\n";
              }
            } 
            // echo "<h1>$email</h1>";

            $servername = "localhost";
            $port_no = 3307; // Port number for Windows 
            $username = "root";
            $password = "";
            $dbname = "fusionfit360";
            try {
              $conn = new PDO("mysql:host=$servername;port=$port_no;dbname=$dbname", $username, $password);
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // begin the transaction
              $conn->beginTransaction();
              
              //----------------------------------------
              $stmt = $conn->query("SELECT * FROM fusionfit360.Facility where did = 1");
              
             
              echo '<table border="1" id="table">',"\n";
            	echo "<tr> <th style='width:20%;'> Fid </th><th style='width:35%;'> Facility </th> </tr>";
		        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		            echo "<tr> <td>";
		            echo $row['fid'];
		            echo "</td><td>";
		            echo $row['facility'];
		            echo "</td></tr>";
		        }
		        echo    "</table>";


            // commit the transaction
            $conn->commit();
  
            }
            catch(PDOException $e) {
              // roll back the transaction if something failed
              $conn->rollback();
              echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    }
  ?>

</div> <!-- overlay k liye -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
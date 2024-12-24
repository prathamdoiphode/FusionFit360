<!DOCTYPE html>
<html>
<head>
	<title>Home Page php</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body onload="slider()">
<div class="banner" >
  <div class="slider" >
      <img src="images/Gym1.jpg" id="slideImg">
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
        <li class="nav-item active">
          <a class="nav-link " aria-current="page" href="registration.php"> <button class="btn btn2" id = "Registration">Sign up || Sign in</button></a>
        </li>

      </ul>
    </div>
  </div>
</nav>


</div>
    <div id="logo">
        <img src="images/logo1.png" style="height: 233px; width: 250px; border-radius : 50%;">
    </div>
    <div class="content">
            <h1 id="PortalName" style="text-shadow: #FC0 1px 0 10px; font-family:Georgia, 'Times New Roman', Times, serif; font-weight:900">FusionFit360</h1><br>
            <p class="describe" style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue;">FusionFit360 is more than a fitness center. <br> It’s a place where your goals and wellbeing take center stage. <br>As a member, you’re part of a community focused on fitness, nutrition, and exceptional support every step of the way.</p>
    </div>
  </div>
  <!-- Overlay khatam -->
  </div>
  
  <div id="home-body" style="background-color: #DCF2F1; height: 50%"><br><h1 style="color: #0f1035; text-align: center; text-shadow: #FC0 1px 0 10px; margin-bottom: 2.5rem;">Discover More About Us</h1>
  
  <div class="content2">
    
    <div class="paraa">
        <h4>Embark on Your Fitness Journey with a 7-Day Trial!</h4>
        <p class="describe" style="padding: 20px;color:#0f1035;">We invite everyone to kick off their FusionFit360 experience with our 7-day trial. This is your opportunity to immerse yourself in our unique fitness philosophy and explore what our membership offers. Join us for group training sessions where you can learn about our methods & get to know our community before making a longer term commitment.

During your initial phase, you will undergo a comprehensive evaluation and a personalized coaching session, ensuring we find the best training package for your needs.

Enjoy a no-obligation trial with a flexible schedule that fits your lifestyle!</p>
    </div>

<div class="formm">
        <h4 >Take Free Trial Now!<br><br></h4>

        <form style="text-align: center; font-size: 13px;" method="post">
          Enter Your Customer ID : <input type = "text" name = "cid" placeholder = "C01" required> </input> <br><br>
          Enter Your Email ID : <input type = "email" name = "email" placeholder = "example@com" required>  </input> <br><br>
          Enter Your Password : <input type = "password" name = "password" required> </input> <br><br>
          Select Department : <select name="did" placeholder="Departments" required>
            <option value=1>Gym</option>
            <option value=2>Yoga</option>
            <option value=3>Diet</option>
          </select><br> <br>
          Select Joining Date : <input type = "Date" name="date" required>  </input> <br><br>
          <input class="favorite styled" type = "submit" value = "Submit"  name="submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input class="favorite styled" type = "reset" value = "Reset"  name="reset" />
          <br><br>
        </form>
    </div>
  </div>
  </div>
        <?php
include ('connect.php');
if(isset($_POST['submit'])){
    $cid = $_POST['cid'];
    $did = $_POST['did'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM fusionfit360.Customer WHERE Cid = :e";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":e", $cid);
    $stmt->execute();

    if($stmt->rowCount() == 0){
        // Uncomment this line if you want to handle non-registered users, otherwise leave it commented.
        // echo '<p style="color: red; font-size: 23%;">You are not registered yet. <br> First register yourself.</p>';
    } else {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Use the correct keys from the fetched row
        if (isset($row['Password']) && isset($row['log_id'])) {
            $hashedPasswordFromDB = $row['Password'];
            $r_email = $row['log_id'];

            if (password_verify($password, $hashedPasswordFromDB) && $r_email == $email) {
                $sql = "SELECT * FROM fusionfit360.Trial WHERE cid = :e AND did = :d";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":e", $cid);
                $stmt->bindParam(":d", $did);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    // Uncomment this line if you want to inform users about existing trial memberships.
                    echo "<div id='flash-message' style='color:red; background-color: #DCF2F1; font-size: 20px; text-align: center;'>You have already taken trial membership for this department.</div>";
                } else {
                    $query = "INSERT INTO fusionfit360.Trial (did, start_date, cid) VALUES (:d, :date, :cid)";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(":d", $did);
                    $stmt->bindParam(":date", $date);
                    $stmt->bindParam(":cid", $cid);
                    $stmt->execute();
                    // Only display this message on successful insertion
                    echo "<div id='flash-message' style='color: green;background-color: #DCF2F1;font-size: 20px; text-align: center;'>Taken Successfully!</div>";
                }
            } else {
                // You can comment this line out if you don't want any messages for incorrect login details
                echo "<div id='flash-message' style='color: red; background-color: #DCF2F1;font-size: 20px; text-align: center;'>Email and Password are not matching.</div>";
            }
        } else {
            // You can comment this line out if you don't want any messages for missing data
            echo "<div id='flash-message' style='color: red; background-color: #DCF2F1;font-size: 20px; text-align: center;'>Error: User data not found in the database.</div>";
        }
    }
}
?>


    </div>
            
  </div>
</div>
<script >
var slideImg = document.getElementById("slideImg");

var image = [
    "images/Gym1.jpg","images/food1.jpg","images/Yoga1.jpg",
    "images/Gym2.jpg","images/food2.jpg","images/Yoga2.jpg",
    "images/Gym3.jpg","images/food3.jpg","images/Yoga3.png"
];
var len = image.length;
var i = 0;
function  slider(){
    if(i > len-1){
      i = 0;
    }
    slideImg.src = image[i];
    i++;
    setTimeout('slider()',2000);
}

setTimeout(function() {
            var flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
              flashMessage.style.display = 'none';
            }

            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
              errorMessage.style.display = 'none';
            }
          }, 2000); // 5000 milliseconds = 5 seconds
          
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
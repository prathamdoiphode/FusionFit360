<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_department.css">
    <title>Adding Staff</title>
</head>
<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="adminpage.php">Admin Page</a></li>
                <li><a href="admin_staff.php">Staff Page</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>Fill out the information below to add new staff</h2><br><br>
            <div>
                <form style="text-align: center" action="" method="post">
                  <br>
                 Staff Id : <input type = "text" name = "sid" placeholder="SF01"required></input> <br><br>
                 First Name : <input type = "text" name = "fname"  required></input> <br><br>
                 Last Name : <input type = "text" name = "lname" required></input> <br><br>
                Gender : <select name="gender" placeholder="cars">
                  <option value="M">Male</option>
                  <option value="F">Female</option>
                </select><br><br>
                  Salary : <input type="number" name="salary" required min="0.01" step="0.01"></input> <br><br>
                 Mobile No. : <input type="tel" name="mob" pattern="^\d{10}$" required="required"> <br><br>
                 Department : <select name="did" >
                  <option value=1>Gym</option>
                  <option value=2>Yoga</option>
                  <option value=3>Diet</option>
                </select><br> <br> <br><BR>
                <input class="favorite styled" type = "submit" value = "Add Staff" name = "submit"/>&nbsp;&nbsp;&nbsp;
                <input class="favorite styled" type = "reset" value = "Reset" name = "reset"/> 
            </div>
            <!-- <h2 style="color:white;"> Player information </h2> -->
        </div>
        <?php
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
          if(isset($_POST['submit'])){
            $sid = $_POST['sid'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $salary = $_POST['salary'];
            $mob = $_POST['mob'];
            $did = $_POST['did'];
            try {
              $conn = new PDO("mysql:host=$servername;port=$port_no;dbname=$dbname", $username, $password);
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // begin the transaction
              $conn->beginTransaction();
              $str =  "INSERT INTO fusionfit360.Staff  VALUES ('$sid','$fname','$lname','$gender','$salary','$mob','$did')";
              $conn->exec($str);
              
              // commit the transaction
              $conn->commit();
              echo "<div id='flash-message' style='color: white; text-align: center; margin-top: 20px;'>Added successfully</div>";
            }
            catch(PDOException $e) {
              // roll back the transaction if something failed
              $conn->rollback();
              echo "<div id='flash-message' style='color: white; text-align: center; margin-top: 20px;'>Error: " . $e->getMessage() . "</div>";
            }

            $conn = null;

          }

        ?>
        <script>
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

    </div>
</body>
</html>

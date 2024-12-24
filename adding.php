<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_department.css">
    <title>Adding Facility</title>
</head>
<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="adminpage.php">Admin Page</a></li>
                <li><a href="admin_department.php">Department Page</a>
                  <li><a href="add_facility.php">Facility Page</a></li></li>
                
            </ul>
        </div>
        <div class="content">
            <h2>Fill in the information below to add a new facility</h2><br>
            <div>
                <form style="text-align: center" action="" method="post">
                  <br>
                Select Department : 
                <select name="did" placeholder="Departments">
                  <option value=1>Gym</option>
                  <option value=2>Yoga</option>
                  <option value=3>Diet</option>
                </select> <br><br>
                Enter Facility : <input type = "text" name = "facility" required></input> <br><br><br>
                <input class="favorite styled" type = "submit" value = "Add facility" name = "submit"/>&nbsp;&nbsp;&nbsp;
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
            $did = $_POST['did'];
            $facility = $_POST['facility'];
            try {
              $conn = new PDO("mysql:host=$servername;port=$port_no;dbname=$dbname", $username, $password);
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // begin the transaction
              $conn->beginTransaction();
              $str =  "INSERT INTO fusionfit360.Facility (facility,did)  VALUES ('$facility','$did')";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_department.css">
    <title>Deleting Facility</title>
</head>
<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="adminpage.php">Admin Page</a></li>
                <li><a href="admin_department.php">Department Page</a></li>
                <li><a href="add_facility.php">Facility Page</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>Enter Following Information to delete!!</h2>
            <div>
                <form style="text-align: center" action="" method="post">
                  <br>
                Enter Department id : <input type = "number" name = "did" required></input> <br>
                <br>
                <input type = "submit" value = "delete" name = "submit"/>
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
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              // set the PDO error mode to exception
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              // begin the transaction
              $conn->beginTransaction();
              $str =  "DELETE FROM fusionfit360.Department WHERE did = $did";
              $conn->exec($str);
              
              // commit the transaction
              $conn->commit();
              echo "</br> </br> Deleted successfully";
            }
            catch(PDOException $e) {
              // roll back the transaction if something failed
              $conn->rollback();
              echo "Error: " . $e->getMessage();
            }

            $conn = null;

          }

        ?>

    </div>
</body>
</html>

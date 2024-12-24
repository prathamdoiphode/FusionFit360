<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_department.css">
    <title>Staff Page</title>
</head>
<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="adminpage.php">Admin Page</a></li>
            </ul>
            <ul>
                  <li><a href="login_admin.php">Logout</a></li>
              </ul>
        </div>
        
        <div class="content">
        <br><br><br><br><br>
            <h1 style="margin-top: 3rem;text-shadow: #FC0 1px 0 10px;">Greetings! You’re on the Staff Page.</h1>
            <div>
                <form style="text-align: center" action="" method="post">
                <br><br><br>
                <h3>Choose Operation</h3><br><br>
                <input type = "radio" value = "show" name = "query"> Show Staff</input> &nbsp; &nbsp;
                <input type = "radio" value = "add" name = "query"> Add Staff</input> &nbsp; &nbsp;
                <input type = "radio" value = "delete" name = "query"> Delete Staff</input> &nbsp;&nbsp;
                <input type = "radio" value = "update" name = "query"> Update Salary </input> <br><br><br>
                <input class="favorite styled" type = "submit" value = "Submit" name = "submit"/> <br><br>
                </form>
            </div>
            <!-- <h2 style="color:white;"> Player information </h2> -->
        
        <div id="table-container">
        <?php
            if(isset($_POST['submit'])){
                $query = $_POST['query'];
                if($query == "show"){
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
                      $stmt = $conn->query("SELECT * FROM fusionfit360.Staff");
    
                        echo '<table border="1" id="table">',"\n";
                        echo "<tr> <th style='width:5%;'> Sid </th><th style='width:7%;'> SFname </th> <th style='width:7%;'>SLname</th><th style='width:5%;'> Gender</th><th style='width:7%;'> Salary </th><th style='width:8%;'> Contact No.</th><th style='width:5%;'>Did </th> </tr>";
                        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr> <td style='padding-left: 0%;'>";
                            echo $row['Staff_id'];
                            echo "</td><td style='padding-left: 0%;'>";
                            echo $row['SFname'];
                            echo "</td><td style='padding-left: 0%;'>";
                            echo $row['SLname'];
                            echo "</td><td style='padding-left: 0%;'>";
                            echo $row['Gender'];
                            echo "</td><td style='padding-left: 0%;'>";
                            echo $row['Salary'];
                            echo "</td><td style='padding-left: 0%;'>";
                            echo $row['Mob_no'];
                            echo "</td><td style='padding-left: 0%;'>";
                            echo $row['Did'];
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

                //-------------------------------------------------TO DELETE DATA-------------------------------------------------------

                if($query == "add"){
                    
                    header("Location: http://localhost/fusionfit360/add_staff.php");
                }
                if($query == "delete"){
                    
                    header("Location: http://localhost/fusionfit360/delete_staff.php");
                }
                if($query == "update"){
                    
                    header("Location: http://localhost/fusionfit360/update_staff.php");
                }

            }

        ?>
</div>
    </div>
    </div>
</body>
</html>

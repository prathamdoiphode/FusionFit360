<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_department.css">
    <title>Departments Page</title>
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
        <div class="content"><br><br><br><br>
            <h1 style="margin-top: 3rem;text-shadow: #FC0 1px 0 10px;">You're on the Department Page, Welcome!</h1>
            <div>
                <form style="text-align: center" action="" method="post">
                <br><br><br>
                <h3>Choose Operation</h3><br><br>
                <input type = "radio" value = "show" name = "query"> Show Department List</input> &nbsp; &nbsp;
                <!-- <input type = "radio" value = "add" name = "query"> Add Department</input> &nbsp; &nbsp; -->
                <!-- <input type = "radio" value = "delete" name = "query"> delete </input>  -->
                <input type = "radio" value = "update" name = "query"> Update Department Fee </input> &nbsp; &nbsp; 
                <input type = "radio" value = "facility" name = "query"> Department Facility </input> 
                <br><br><br>
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
                      $stmt = $conn->query("SELECT Did,Dname,Fee FROM fusionfit360.Department");
    
                        echo '<table border="1" id="table" overflow-y: auto; max-height: 100vh;>',"\n";
                        echo "<tr> <th style='width:20%;'> Did </th><th style='width:35%;'> Dname </th> <th style='width:45%;'>Monthly Fee</th> </tr>";
                        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr> <td>";
                            echo $row['Did'];
                            echo "</td><td>";
                            echo $row['Dname'];
                            echo "</td><td>";
                            echo $row['Fee'];
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
                    
                    header("Location: http://localhost/fusionfit360/add_department.php");
                }
                if($query == "delete"){
                    
                    header("Location: http://localhost/fusionfit360/delete_department.php");
                }
                if($query == "update"){
                    
                    header("Location: http://localhost/fusionfit360/update_department.php");
                }
                if($query == "facility"){
                    
                    header("Location: http://localhost/fusionfit360/add_facility.php");
                }

            }

        ?>
        </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_style.css">
    <title>User Page</title>
</head>
<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <?php
              include 'connect.php';
              session_start();
              if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
                // Redirect to login page if not logged in
                header("Location: login_user.php");
                exit();
            }

              $mail = $_SESSION['email'];
              $sql = "SELECT * from fusionfit360.Customer where Log_id = :e";
              // $password = md5($_POST['password']);
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":e",$mail);
              $stmt->execute();
              //----------------------------------------
              $row=$stmt->fetch(PDO::FETCH_ASSOC);
              $Fname = $row['fname'];   
              $cid = $row['cid'];
              echo "<h1 style='margin-top:-8%; font-size: 243%; text-shadow: #FC0 1px 0 10px;'>Glad to have you with us, $Fname!</h1>";
              
            ?>
            <br><br>
            <div>
                <div style="display: flex; margin-left:37%;">
                    <div style="padding-right: 8%;">
                        <form method="post">
                            <input class="favorite styled" type = "submit" value = "My Membership" name = "submit" />
                        </form>
                    </div>
                    <div>
                        <h3> New Membership </h3> <br>
                        <form method="post">
                            <input type="date" name="date" placeholder="joining date" required/><br><br>
                            <select name="did" placeholder="Departments">
                              <option value=1>Gym</option>
                              <option value=2>Yoga</option>
                              <option value=3>Diet</option>
                            </select><br> <br>
                            <input class="favorite styled" type = "submit" value = "Take Membership" name = "submit2" />
                       </form>
                    </div>
                </div>
                
                
                
            </div>
        </div>
        <?php
 
          include 'connect.php';

          
                    

          if(isset($_POST['submit'])){
              $mail = $_SESSION['email'];
              // $password = $_SESSION['password'];
              //session_start()
              //--------------------------------------
              //echo "  $cid      ";
              $sql = "SELECT * from fusionfit360.membership where cid = :e";
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":e",$cid);
              $stmt->execute();
              //----------------------------------------
                echo '<table border="1" id="table" style="margin-top: 27%">',"\n";
                echo "<tr> <th style='width:2%;'> Did </th> <th style='width:2%;'>Date of Joining</th><th style='width:2%;'> Cid </th> </tr>";
                while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr> <td style='padding-left: 0%;'>";
                    echo $row['did'];
                    echo "</td><td style='padding-left: 0%;'>";
                    echo $row['start_date'];
                    echo "</td><td style='padding-left: 0%;'>";
                    echo $row['cid'];
                    echo "</td></tr>";
                }
                echo    "</table>";              
          }
          if(isset($_POST['submit2'])){
              $mail = $_SESSION['email'];
              $did = $_POST['did'];
              $date = $_POST['date'];
              //--------------------------------------------
              


              //---------------------------------------------

              $sql = "SELECT * from fusionfit360.membership where cid = :e and did = '$did'";
              // $password = md5($_POST['password']);
              $stmt = $conn->prepare($sql);
              $stmt->bindParam(":e",$cid);
              $stmt->execute();
              //----------------------------------------       
              if($stmt->rowCount() > 0){
                echo "<div id='flash-message' style='color: white; text-align: center; margin-top: 20px;'> Your have already taken membership for this department. </div>";
              }
              else{
                $query = "INSERT INTO fusionfit360.membership (did,start_date,cid) VALUES ('$did','$date','$cid')";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                echo "<div id='flash-message' style='color: white; text-align: center; margin-top: 20px;'>Taken Sucessfully</div>";
              }
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
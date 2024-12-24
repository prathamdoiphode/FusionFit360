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
                <li><a href="admin_department.php">Department Page</a></li>
            </ul>
        </div>
        <div class="content"><br><br>
            <h1 style="text-shadow: #FC0 1px 0 10px;">Facility!</h1>
            <div>
                <form style="text-align: center" action="" method="post">
                <br><br><br>
                <h3>Choose Operation</h3><br><br><br>
                <!-- //-------------Gym---------- -->
                <input type = "radio" value = "gym" name = "query" > Show Gym Facilities</input> &nbsp;&nbsp;
                <input type = "radio" value = "yoga" name = "query"> Show Yoga Facilities</input>  &nbsp;&nbsp;
      			<input type = "radio" value = "diet" name = "query"> Show Diet Facilities</input> &nbsp;&nbsp; <br><br>
                <!-- <input type = "radio" value = "all" name = "query"> Show All Facilities</input>&nbsp;&nbsp; -->
                <input type = "radio" value = "add" name = "query"> Add Facility</input>&nbsp;&nbsp;
                <input type = "radio" value = "delete" name = "query"> Delete Facility</input><br><br><br>
                <input class="favorite styled" type = "submit" value = "Submit" name = "submit"/> <br><br>
                </form>
            </div>
            
        </div>
		<br>
        <?php
		    include 'connect.php';
		    if(isset($_POST['submit'])){
		     //----------------------------------------------
		      $query = $_POST['query'];
		      if($query == "add"){
		      		header("Location: http://localhost/fusionfit360/adding.php");
		      }
		      else if($query == "delete"){
		      		header("Location: http://localhost/fusionfit360/delete_facility.php");
		      }
		      else if($query == "gym"){
		      	  $sql = "SELECT * from fusionfit360.Facility where did = 1";
		      }
		      
		      //-----------------------------------------
		      else if($query == "yoga"){
		      	  $sql = "SELECT * from fusionfit360.Facility where did = 2";
			      
		      }
		      else if($query == "diet"){
		      	  $sql = "SELECT * from fusionfit360.Facility where did = 3";
		      }
		      else if($query == "all"){
		      	  $sql = "SELECT * from fusionfit360.Facility";
		      }
		      $stmt = $conn->prepare($sql);
		      $stmt->execute();
					echo '<table border="1" id="table" style="margin-top:22%;">',"\n";
		        echo "<tr> <th style='width:20%;'>Fid</th><th style='width:35%;'> Facilty </th>  </tr>";
		        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		            echo "<tr> <td>";
		            echo $row['fid'];
		            echo "</td><td>";
		            echo $row['facility'];
		            echo "</td></tr>";
		        }
		        echo    "</table>";
			}
		?>
    </div>
</body>
</html>

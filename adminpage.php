<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page if not logged in
    header("Location: login_admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="website1" content="This is the first practice html+css website">
    <link rel="stylesheet" href="admin_style.css">
    <title>Admin Page</title>
</head>

<body>
    <div class="banner">
        <div class="navebar">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <ul>
                <li><a href="logout.php">Logout</a></li>

                <!-- <li>
                    <form method="post" action="">
                        <input type="submit" name="submit" value="log-out" style="background-color: transparent; color: yellow;">
                    </form>
                </li> -->



            </ul>
        </div>
        <div class="content">
            <h1 style="margin-bottom: 20px;text-shadow: #FC0 1px 0 10px;">Welcome, Admin! Let’s get started.</h1><br><br>
            <div>
                <a href="admin_department.php"> <button type="button" style="font-size: large;"><span></span>Department</button> </a>
                <a href="admin_staff.php"> <button type="button" style="font-size: large;"> <span></span>Staff</button> </a>
            </div>
        </div>
    </div>

</body>

</html>
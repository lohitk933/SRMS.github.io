<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../Styles/db.css">
</head>

<body>
    <h3>
        <?php echo "Welcome ". $_SESSION['username']?>! You can now use this website
    </h3>

    <header>
        <a href="#" class="srms">Faculty Dashboard</a>

        <nav class="navbar">
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="sview.php">Student_Details</a></li>
                <li><a href="addresult.php">Result</a>
                    <ul>
                        <a href="1semresult.php">1st Semester</a>
                        <a href="2semresult.php">2nd Semester</a>
                        <a href="3semresult.php">3rd Semester</a>
                        <a href="4semresult.php">4th Semester</a>
                        <a href="5semresult.php">5th Semester</a>
                        <a href="6semresult.php">6th Semester</a>
                        <a href="7semresult.php">7th Semester</a>
                        <a href="8semresult.php">8th Semester</a>
                    </ul>
                </li>
                <li class="nav-item1">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png">
                        <?php echo "Welcome ". $_SESSION['username']?>
                    </a>
                </li>

            </ul>
        </nav>

    </header>

    <!-- Footer -->
    <footer class="footer">
        <p>VKIT © 2021 Copyright: SRMS <a href="https://www.google.com/">Lohit | | Nagaraj</a></p>
    </footer>
    <!-- Footer -->

</body>

</html>
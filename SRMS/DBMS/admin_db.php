<?php

session_start();

if(!isset($_SESSION['loggedin1']) || $_SESSION['loggedin1'] !==true)
{
    header("location: admin.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../Styles/db.css">
</head>

<body>

    <header>
        <a href="" class="srms"><span>Admin Dashboard</span></a>


        <nav class="navbar">
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="">Student</a>
                    <ul>
                        <a href="sinsert.php">Add_Details</a>
                        <a href="sedit.php">Edit_Details</a>
                    </ul>
                </li>

                <li><a href="">Faculty</a>
                    <ul>
                        <a href="afedit.php">Applied to join</a>
                        <a href="finsert.php">Add Faculty</a>
                        <a href="fedit.php">Edit Faculty</a>
                    </ul>
                </li>
                <li><a href="sresult.php">Result</a></li>
                <li class="nav-item1">
                    <a class="nav-link" href="logout0.php">Logout</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png">
                        <?php echo "Welcome ". $_SESSION['ausername']?>
                    </a>
                </li>
            </ul>
        </nav>

    </header>
    <h3>
        <?php echo "Welcome ". $_SESSION['ausername']?>! You can now use this website..
    </h3>

    <!-- Footer -->
    <footer class="footer">
        <p>VKIT © 2021 Copyright: SRMS <a href="https://www.google.com/">Lohit | | Nagaraj</a></p>
    </footer>
    <!-- Footer -->

</body>

</html>
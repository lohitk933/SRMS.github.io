<?php

session_start();

if(isset($_SESSION['usn']))
{
    header("location: rpage.php");
    exit;
}

    $login = "flase";
    $showerror = "false";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$server = "localhost";
$username = "root";
$password = "";
$database = "my";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

    $usn = $_POST["usn"];
    $password = $_POST["password"];

    $sql = "Select * from sdetails where usn='$usn' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;  
        session_start();
        $_SESSION['loggedin2'] = true;
        $_SESSION['usn'] = $usn;
        $_SESSION['password'] = $password;
        header("Location: rpage.php");  
    }
    else{
        // echo "Usn or Password you entered is wrong.....---> ". mysqli_error($conn);

        header("Location: result.php?error=Usn or Password you entered is wrong.....");
        	        exit();
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Result</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../Styles/result.css">
</head>

<body>

    <header>
        <a href="result.php" class="srms">Get Your Result</a>

        <nav class="navbar">
            <ul>
                <li><a href="main.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href=""><i class="fas fa-sign-in-alt"></i> Login's</a>
                    <ul>
                        <a href="admin.php"><i class="fas fa-users-crown"></i> Admin</a>
                        <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </ul>
                </li>
                <li><a href="about.php"><i class="fas fa-address-card"></i> About Us</a></li>
                <li><a href="contact.php"><i class="fas fa-id-badge"></i> Contact us</a></li>
                <li><a href=""><i class="fas fa-registered"></i> Register</a>
                    <ul>
                        <a href="sregister.php"><i class="fas fa-registered"></i> Student</a>
                        <a href="register.php"><i class="fas fa-registered"></i> Faculty_R</a>
                    </ul>
                </li>
                <li><a href="result.php"><i class="fas fa-external-link-alt"></i> Student</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>


    <div class="back"></div>
    <div class="result">
        <img src="../img/7.webp" class="img" alt="Student">
        <h4>All The Best</h4>
        <form action="" method="post">
            <p>USN No</p>
            <input type="text" name="usn" placeholder="Enter your USN number" style="text-transform: uppercase">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter your password">
            <input type="submit" name="" value="Get Your Result">
            <a href="contact.php">Apply For New Admmision.....</a><br>
            <a href="contact.php">Can't Find The Details?</a>
        </form>
    </div>


    <?php if (isset($_GET['error'])) { ?>
    <p class="error">
        <?php echo $_GET['error']; ?>
    </p>
    <?php } 
    ?>

    <!-- Footer -->
    <footer class="footer">
        <p>VKIT © 2021 Copyright: SRMS <a href="https://www.google.com/">Lohit | | Nagaraj</a></p>
    </footer>
    <!-- Footer -->

</body>

</html>
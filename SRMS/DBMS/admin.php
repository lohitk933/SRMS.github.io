<?php
session_start();

if(isset($_SESSION['ausername']))
{
    header("location: admin_db.php");
    exit;
}

    $login = "flase";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$server = "localhost";
$username = "root";
$password = "";
$database = "my";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
}

    $ausername = $_POST["ausername"];
    $password = $_POST["password"]; 

    $sql = "Select * from admin where ausername='$ausername' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;  
        session_start();
        $_SESSION['loggedin1'] = true;
        $_SESSION['ausername'] = $ausername;
        $_SESSION['password'] = $password;
        header("Location: admin_db.php");  
    }
    else{
        header("Location: admin.php?error=Admin Username or Password is wrong");
        	        exit();
    }
}
?>

<!-- HTML STRAT FROM HERE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../Styles/admin.css">
</head>

<body>
    <style></style>

    <header>
        <a href="" class="srms">Admin Login</a>

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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div class="container">
        <div class="title">WelCome To Admin Login</div>
        <form action="" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" placeholder="Enter your username" style="text-transform: lowercase"
                        name="ausername">
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your Password" name="password">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Login">
            </div>
            <?php if (isset($_GET['error'])) { ?>
            <p class="error">
                <?php echo $_GET['error']; ?>
            </p>
            <?php } ?>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>VKIT © 2021 Copyright: SRMS <a href="https://www.google.com/">Lohit | | Nagaraj</a></p>
    </footer>
    <!-- Footer -->

</body>

</html>
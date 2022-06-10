<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "my";
    // Database connection 
    $con = mysqli_connect("$server","$username","$password","$database");
    if(!$con){
        die("connection Failed" .mysqli_connect_error());
    }
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email= $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `conf` (`name`, `gender`, `age`, `email`, `phone`, `desc`) VALUES ('$name', '$gender', '$age', '$email', '$phone', '$desc')";
    
    // echo $sql;
    if($con->query($sql) == true){
        $insert = true;
        // echo "Successfully inserted";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!-- HTML FILE OF CONNECT -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../Styles/contact.css">
</head>

<body>

    <header>
        <a href="#" class="srms">Contact</a>

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
    <div class="container">
        <h1>Always There For You</h1>
        <h2>Welcome to Result Management system</h2>
        <?php
        if($insert == true){
        echo "<p class='submit'>Your request is submitted</p>";
        }
        ?>
        <form action="contact.php" method="post">
            <input type="text" name="name" id="name" minlength="5" placeholder="Enter your Name" required>
            <input type="tel" name="age" id="age" minlength="2" maxlength="2" placeholder="Enter your Age" required>


            <input type="email" name="email" id="email" placeholder="Enter your Email" required>
            <input type="tel" name="phone" id="phone_no" minlength="10" maxlength="10" placeholder="Enter your Number"
                required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any information u want to say"
                required></textarea>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1" value="male" required>
                <input type="radio" name="gender" id="dot-2" value="female" required>
                <input type="radio" name="gender" id="dot-3" value="none" required>
                <h6 class="gender-title">Gender</h6>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Others</span>
                    </label>
                </div>
            </div>
            <button type="submit" name="submit" class="btn">Submit</button>
        </form>

    </div>
    <!-- Footer -->
    <footer class="footer">
        <p>VKIT © 2021 Copyright: SRMS <a href="https://www.google.com/">Lohit | | Nagaraj</a></p>
    </footer>
    <!-- Footer -->

</body>

</html>
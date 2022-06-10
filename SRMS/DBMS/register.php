<?php


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

// Sql query to be executed
$fname = $_POST["fname"];
$email = $_POST["email"];
$number = $_POST["number"];
$address = $_POST["address"];
$username = $_POST["username"];
$password = $_POST["password"];
$qualification = $_POST["qualification"];
$subject = $_POST["subject"];
$gender = $_POST["gender"];

$sql = "SELECT username FROM fdetails WHERE username='{$username}'";
$result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
if (mysqli_num_rows($result) > 0) {
    // echo "The USERNAME Already Exsist Enter a Diff Username ---> ". mysqli_error($conn);
    header("Location: register.php?error=Username Already Exist Enter The correct Username ");
}

else{
        $sql = "SELECT number FROM fdetails WHERE number='{$number}'";
        $result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
        if (mysqli_num_rows($result) > 0) {
            // echo "The Mobile Number You Entered Already Exsist Enter The correct Mobile Number ---> ". mysqli_error($conn);
        header("Location: register.php?error=The Mobile Number You Entered Already Exsist Enter The correct Mobile Number");

        }
        else{

                // Sql query to be executed
                $sql = "INSERT INTO `fdetails` (`fname`, `email`, `number`, `address`, `username`, `password`, `qualification`, `subject`, `gender`, `timestamp`) VALUES ('$fname', '$email', '$number', '$address', '$username', '$password', '$qualification', '$subject', '$gender', CURRENT_TIMESTAMP)";
                $result = mysqli_query($conn, $sql);

                
                if($result){ 
                    $insert = true;
                    header("location: register.php?error=You Are Now Register.......");
                }
                else{
                    // echo "The Details was not inserted successfully because of this error ---> ". mysqli_error($conn);
                    header("Location: register.php?error=The Details was not inserted successfully because of this error ---...");
                    
                } 
            }
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Faculty Registration</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../Styles/register.css">
</head>

<body>
    <style>

    </style>
    <header>
        <a href="register.php" class="srms">Faculty Registration</a>

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

    <?php if (isset($_GET['error'])) { ?>
    <p class="error">
        <?php echo $_GET['error']; ?>
    </p>
    <?php } 
    ?>
    <br>

    <div class="container">
        <div class="title">Faculty Registration</div>
        <form action="register.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full name</span>
                    <input type="text" placeholder="Enter Your Full name" name="fname" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter Your Email" name="email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone number</span>
                    <input type="tel" placeholder="Enter Your Phone number" name="number" minlength="10" maxlength="10"
                        required>
                </div>
                <div class="input-box">
                    <span class="details">Adaress</span>
                    <input type="text" placeholder="Enter Your Address" name="address" required>
                </div>
                <div class="input-box">
                    <span class="details">Username & Password</span>
                    <input style="text-transform: lowercase" type="text" name="username" maxlength="11"
                        class="form-control" id="autoSizingInputGroup" placeholder="Username" required>
                    <input type="password" name="password" style="text-transform: lowercase" class="form-control"
                        id="password" placeholder="Password" required>
                </div>

                <div class="input-box">
                    <span class="details">Qualification & Subject</span>
                    <input type="text" aria-label="First name" name="qualification"
                        placeholder="Enter Your Qualification" class="form-control" required>
                    <input type="text" aria-label="Last name" name="subject" placeholder="Enter Your Teaching Subject"
                        class="form-control" required>
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1" value="male" required>
                <input type="radio" name="gender" id="dot-2" value="female" required>
                <input type="radio" name="gender" id="dot-3" value="none" required>
                <span class="gender-title">Gender</span>
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
                        <span class="gender">Prefer not to say</span>
                    </label>
                </div>
            </div>
            <button class="btn">Register</button>

        </form>

    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>VKIT © 2021 Copyright: SRMS <a href="https://www.google.com/">Lohit | | Nagaraj</a></p>
    </footer>
    <!-- Footer -->

</body>

</html>
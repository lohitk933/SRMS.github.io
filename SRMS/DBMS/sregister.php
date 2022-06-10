<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

$server = "localhost";
$username = "root";
$password = "";
$database = "my";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
                die("Error". mysqli_connect_error());
            }

// Sql query to be executed
$fname = $_POST["fname"];
$email = $_POST["email"];
$number = $_POST["number"];
$address = $_POST["address"];
$usn = $_POST["usn"];
$password = $_POST["password"];
$sem = $_POST["sem"];
$sec = $_POST["sec"];
$gender = $_POST["gender"];


$sql = "SELECT usn FROM sdetails WHERE usn='{$usn}'";
$result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
if (mysqli_num_rows($result) > 0) {
    // echo "The USN Already Exsist Enter The correct USN ---> ". mysqli_error($conn);
    header("Location: sregister.php?error=USN Number Already Exist Enter The correct USN ");

}

else{
        $sql = "SELECT number FROM sdetails WHERE number='{$number}'";
        $result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
        if (mysqli_num_rows($result) > 0) {
            // echo "The Mobile Number You Entered Already Exsist Enter The correct Mobile Number ---> ". mysqli_error($conn);
        header("Location: sregister.php?error=Mobile Number Already Exist Enter a Diff Mobile number ");
            
        }
        else{
                $sql = "SELECT email FROM sdetails WHERE email='{$email}'";
                $result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
                if (mysqli_num_rows($result) > 0) {
                    // echo "The Mobile Number You Entered Already Exsist Enter The correct Mobile Number ---> ". mysqli_error($conn);
                header("Location: sregister.php?error=Email Already Exist Enter a Diff EmailId ");
                
                }
                else{
                        $sql = "INSERT INTO `sdetails` (`fname`, `email`, `number`, `address`, `usn`, `password`, `sem`, `sec`, `gender`, `timestamp`) VALUES ('$fname', '$email','$number', '$address', '$usn', '$password', '$sem', '$sec', '$gender', CURRENT_TIMESTAMP)";
                        $result = mysqli_query($conn, $sql);
                        if($result){ 
                            $insert = true;
                            header("location: sregister.php?error=You Are Now Register Go Check Your Result.......");  

                        }
                        else{
                            echo "The Details was not inserted successfully because of this error ---> ". mysqli_error($conn);
                        }
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
    <title>New Student Registration</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../Styles/sregister.css">
</head>

<body>

    <header>
        <a href="sregister.php" class="srms">Student Registration</a>

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
        <div class="title">Student Registration</div>
        <form action="sregister.php" method="post">
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
                    <span class="details">Address</span>
                    <input type="text" name="address" placeholder="House_no or Apartment_no, Street, Area, City, state">
                </div>
                <div class="input-box">
                    <span class="details">Sem</span>
                    <select class="details" name="sem" id="sem">
                        <option selected>1st</option>
                        <option>2nd</option>
                        <option>3rd</option>
                        <option>4th</option>
                        <option>5th</option>
                        <option>6th</option>
                        <option>7th</option>
                        <option>8th</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Sec</span>
                    <select class="input" name="sec" id="sec">
                        <option selected>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Usn</span>
                    <input type="tel" placeholder="Enter Your Usn Id (1VK)" name="usn" minlength="10" maxlength="10"
                        required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter Your Password" name="password" minlength="5"
                        maxlength="10" required>
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
<?php  
session_start();
if(!isset($_SESSION['loggedin1']) || $_SESSION['loggedin1'] !==true)
{
    header("location: admin.php");
}
$insert = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "my";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
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
        echo "The USN Already Exsist Enter The correct USN ---> ". mysqli_error($conn);
    }
  
    else{
            $sql = "SELECT number FROM sdetails WHERE number='{$number}'";
            $result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
            if (mysqli_num_rows($result) > 0) {
                echo "The Mobile Number You Entered Already Exsist Enter The correct Mobile Number ---> ". mysqli_error($conn);
            }
            else{
                // Sql query to be executed
                $sql = "INSERT INTO `sdetails` (`fname`, `email`, `number`, `address`, `usn`, `password`, `sem`, `sec`, `gender`, `timestamp`) VALUES ('$fname', '$email','$number', '$address', '$usn', '$password', '$sem', '$sec', '$gender', CURRENT_TIMESTAMP)";
                $result = mysqli_query($conn, $sql);
                if($result){ 
                    $insert = true;
                }
                else{
                    echo "The Details was not inserted successfully because of this error ---> ". mysqli_error($conn);
                } 
            }
        }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/insertall.css">


    <title>New Students Details</title>

</head>

<body>
    <style>

    </style>
    <header>
        <a href="#" class="srms"><span>New Student Details</span></a>
        <nav class="navbar">
            <ul>
                <li><a href="admin_db.php">Home</a></li>
                <li><a href="sinsert.php">Student</a>
                    <ul>
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
                        <?php echo "loggedin ". $_SESSION['ausername']?>
                    </a>
                </li>
            </ul>
        </nav>

    </header>

    <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> The Details has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>


    <div class="container my-4">
        <h2>Add Details Of New Students</h2>

        <form action="sinsert.php" method="POST" class="row g-3">
            <div class="col-md-4 my-1 mb-3">
                <label for="inputName" class="form-label">Enter The Full Name</label>
                <input type="text" name="fname" aria-label="First name" class="form-control"
                    placeholder="Enter The Full name">
            </div>
            <div class="col-6 my-1 mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input style="text-transform: lowercase" type="email" name="email" class="form-control" id="email"
                    placeholder="Enter The Email">
                <label for="inputNumber" class="form-label">Mobile Number</label>
                <input type="tel" name="number" class="form-control" id="number" minlength="10" maxlength="10"
                    placeholder="Enter the Contact Number">
            </div>
            <div class="col-5 my-1 mb-3">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address"
                    placeholder="House_no or Apartment_no, Street, Area, City, state">
            </div>
            <div class="col-5 my-1 mb-3">
                <label class="visually-hidden" for="autoSizingInputGroup">Usn And Password</label>
                <div class="input-group">
                    <div class="input-group-text">1VK</div>
                    <input type="text" name="usn" style="text-transform: uppercase" class="form-control" maxlength="10"
                        id="usn" placeholder="USN">
                    <div class="input-group-text">1a@</div>
                    <input type="password" name="password" style="text-transform: lowercase" class="form-control"
                        id="password" placeholder="Password">
                </div>
            </div>
            <div class="input-group col-md-3 my-4 mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Semister</label>
                <select class="form-select" name="sem" id="sem">
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
            <div class="input-group col-md-3 my-4 mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Section</label>
                <select class="form-select" name="sec" id="sec">
                    <option selected>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                </select>
            </div>
            <div class="input-group col-md-4 my-4 mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                <select class="form-select" name="gender" id="gender">
                    <option selected>Male</option>
                    <option>Female</option>
                    <option>Prefer not to say</option>
                </select>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                    <label class="form-check-label" for="gridCheck">
                        Confirm the Details
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit The Record</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
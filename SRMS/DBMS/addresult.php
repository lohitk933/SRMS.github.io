<?php  
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

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
    $usn = $_POST["usn"];
    $sem = $_POST["sem"];
    $sec = $_POST["sec"];
    $sub1 = $_POST["sub1"];
    $sub2 = $_POST["sub2"];
    $sub3 = $_POST["sub3"];
    $sub4 = $_POST["sub4"];
    $sub5 = $_POST["sub5"];
    $sub6 = $_POST["sub6"];

    $tmarks = $sub1 + $sub2 + $sub3 + $sub4 + $sub5 + $sub6; 
    $cent = $tmarks/6;
    if($cent>85){
        $grade = 'A+';
    }else if($cent>70 && $cent<84){
        $grade = 'B';
    }else if($cent>50 && $cent<69){
      $grade = 'C';
    }else if($cent>35 && $cent<49){
        $grade = 'D';
    }else{
        $grade = 'FAIL';
    }


    $sql = "SELECT usn FROM result WHERE usn='{$usn}'";
    $result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
    if (mysqli_num_rows($result) > 0) {
        echo "Result is already declared u can't add this student result---> ". mysqli_error($conn);
    }
    else{

            $sql = "SELECT usn FROM sdetails WHERE usn='{$usn}'";
            $result = mysqli_query($conn,$sql) or die("Query unsuccessful") ;
            if (mysqli_num_rows($result) > 0) 
            {
                $sql = "INSERT INTO `result` (`fname`, `usn`, `sem`, `sec`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `tmarks`, `cent`, `grade`, `timestamp`) VALUES ('$fname', '$usn','$sem', '$sec', '$sub1', '$sub2', '$sub3', '$sub4', '$sub5', '$sub6', '$tmarks', '$cent', '$grade', CURRENT_TIMESTAMP)";
                $result = mysqli_query($conn, $sql);
                if($result){ 
                    echo "Result Added Successfully....... ". mysqli_error($conn);
                }
                else{
                    echo "The Details was not inserted successfully because of this error ---> ". mysqli_error($conn);
                }

            }
      
        else{// Sql query to be executed
                echo "There is no student details by this usn number ---> ". mysqli_error($conn);
                 
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

    <title>Adding Result</title>

</head>

<body>
    <style>

    </style>
    <header>
        <a href="addresult.php" class="srms"><span>Add Result</span></a>
        <nav class="navbar">
            <ul>
                <li><a href="faculty_db.php">Home</a></li>
                <li><a href="sview.php">Student</a></li>
                <li><a href="addresult.php">Result</a>
                    <ul>
                        <a href="1semresult.php">1st Semister</a>
                        <a href="2semresult.php">2nd Semister</a>
                        <a href="3semresult.php">3rd Semister</a>
                        <a href="4semresult.php">4th Semister</a>
                        <a href="5semresult.php">5th Semister</a>
                        <a href="6semresult.php">6th Semister</a>
                        <a href="7semresult.php">7th Semister</a>
                        <a href="8semresult.php">8th Semister</a>
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


    <div class="container my-4">
        <h2>Add Student Result</h2>

        <form action="addresult.php" method="POST" class="row g-3">
            <div class="col-md-5 my-1 mb-3">
                <label for="inputName" class="form-label">Enter The Full Name</label>
                <input type="text" name="fname" aria-label="First name" class="form-control"
                    placeholder="Enter The Full name">
            </div>

            <div class="col-4 my-1 mb-3">
                <label class="visually-hidden" for="autoSizingInputGroup">Usn</label>
                <div class="input-group">
                    <div class="input-group-text">1VK</div>
                    <input type="text" name="usn" style="text-transform: uppercase" class="form-control" maxlength="10"
                        id="usn" placeholder="USN">
                </div>
            </div>

            <div class="col-md-4 my-1 mb-3">
                <label for="inputSub_Name" class="form-label">Subject 1</label>
                <input type="tel" placeholder="1st Subject Marks" name="sub1" minlength="1" maxlength="2"
                    class="form-control" required>
            </div>

            <div class="col-md-4 my-1 mb-3">
                <label for="inputSub_Name" class="form-label">Subject 2</label>
                <input type="tel" placeholder="2nd Subject Marks" name="sub2" minlength="1" maxlength="2"
                    class="form-control" required>
            </div>

            <div class="col-md-4 my-1 mb-3">
                <label for="inputSub_Name" class="form-label">Subject 3</label>
                <input type="tel" placeholder="3rd Subject Marks" name="sub3" minlength="1" maxlength="2"
                    class="form-control" required>
            </div>

            <div class="col-md-4 my-1 mb-3">
                <label for="inputSub_Name" class="form-label">Subject 4</label>
                <input type="tel" placeholder="4th Subject Marks" name="sub4" minlength="1" maxlength="2"
                    class="form-control" required>
            </div>

            <div class="col-md-4 my-1 mb-3">
                <label for="inputSub_Name" class="form-label">Subject 5</label>
                <input type="tel" placeholder="5th Subject Marks" name="sub5" minlength="1" maxlength="2"
                    class="form-control" required>
            </div>

            <div class="col-md-4 my-1 mb-3">
                <label for="inputSub_Name" class="form-label">Subject 6</label>
                <input type="tel" placeholder="6th Subject Marks" name="sub6" minlength="1" maxlength="2"
                    class="form-control" required>
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

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                    <label class="form-check-label" for="gridCheck">
                        Confirm the Details
                    </label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Declare The Result</button>
            </div><br>
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
<?php  
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}
 $update = false;
 $delete = false;
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

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `result` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset( $_POST['snoEdit'])){
    // Update the record
      $sno = $_POST["snoEdit"];
      $fname = $_POST["fnameEdit"];
      $sub1 = $_POST["sub1Edit"];
      $sub2 = $_POST["sub2Edit"];
      $sub3 = $_POST["sub3Edit"];
      $sub4 = $_POST["sub4Edit"];
      $sub5 = $_POST["sub5Edit"];
      $sub6 = $_POST["sub6Edit"];
  
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
    // Sql query to be executed
    $sql = "UPDATE `result` SET `fname` = '$fname',  `sub1` = '$sub1', `sub2` = '$sub2', `sub3` = '$sub3', `sub4` = '$sub4', `sub5` = '$sub5', `sub6` = '$sub6', `tmarks` = '$tmarks', `cent` = '$cent', `grade` = '$grade' WHERE `result`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if($result){
      $update = true;
  }
  else{
      echo "We could not update the record successfully";
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../Styles/insertall.css">

    <title>5th Sem Result</title>

</head>

<body>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">1st Sem Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="5semresult.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">

                        <div class="col-md-8 my-1 mb-3">
                            <label for="inputName" class="form-label">Enter Full Name</label>
                            <input type="text" name="fnameEdit" id="fnameEdit" aria-label="First name"
                                class="form-control" placeholder="Enter The Full name">
                        </div>

                        <div class="col-4 my-1 mb-3">
                            <label for="inputsub1" class="form-label">ME</label>
                            <input type="text" name="sub1Edit" class="form-control" id="sub1Edit" placeholder="18MAT11">
                        </div>
                        <div class="col-4 my-1 mb-3">
                            <label for="inputsub2" class="form-label">CNS</label>
                            <input type="text" name="sub2Edit" class="form-control" id="sub2Edit" placeholder="18PHY12">
                        </div>
                        <div class="col-4 my-1 mb-3">
                            <label for="inputsub3" class="form-label">DBMS</label>
                            <input type="text" name="sub3Edit" class="form-control" id="sub3Edit" placeholder="18ELE13">
                        </div>
                        <div class="col-4 my-1 mb-3">
                            <label for="inputsub4" class="form-label">ATC</label>
                            <input type="text" name="sub4Edit" class="form-control" id="sub4Edit" placeholder="18CIV14">
                        </div>
                        <div class="col-4 my-1 mb-3">
                            <label for="inputsub5" class="form-label">ADP</label>
                            <input type="text" name="sub5Edit" class="form-control" id="sub5Edit" placeholder="18GP15">
                        </div>
                        <div class="col-4 my-1 mb-3">
                            <label for="inputsub6" class="form-label">UNIX</label>
                            <input type="text" name="sub6Edit" class="form-control" id="sub6Edit" placeholder="18ENG16">
                        </div>

                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update The Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <header>
        <a href="5semresult.php" class="srms"><span>5th Sem Result Details</span></a>
        <nav class="navbar">
            <ul>
                <li><a href="faculty_db.php">Home</a></li>
                <li><a href="sview.php">Student</a></li>
                <li><a href="addresult.php">Result</a>
                    <ul>
                        <a href="1semresult.php">1st Semester</a>
                        <a href="2semresult.php">2nd Semester</a>
                        <a href="3semresult.php">3rd Semester</a>
                        <a href="4semresult.php">4th Semester</a>
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
    <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Record has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
    <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Record has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
    <div class="container my-4">


        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Fname</th>
                    <th scope="col">Usn</th>
                    <th scope="col">Sem</th>
                    <th scope="col">Sec</th>
                    <th scope="col">ME</th>
                    <th scope="col">CNS</th>
                    <th scope="col">DBMS</th>
                    <th scope="col">ATC</th>
                    <th scope="col">ADP</th>
                    <th scope="col">UNIX</th>
                    <th scope="col">%</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT * from result where sem='5th'";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['fname'] . "</td>
            <td>". $row['usn'] . "</td>
            <td>". $row['sem'] . "</td>
            <td>". $row['sec'] . "</td>
            <td>". $row['sub1'] . "</td>
            <td>". $row['sub2'] . "</td>
            <td>". $row['sub3'] . "</td>
            <td>". $row['sub4'] . "</td>
            <td>". $row['sub5'] . "</td>
            <td>". $row['sub6'] . "</td>
            <td>". $row['cent'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
          </tr>";
        } 
          ?>
            </tbody>
        </table>
    </div>
    <hr>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();

        });
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                fname = tr.getElementsByTagName("td")[0].innerText;
                sub1 = tr.getElementsByTagName("td")[4].innerText;
                sub2 = tr.getElementsByTagName("td")[5].innerText;
                sub3 = tr.getElementsByTagName("td")[6].innerText;
                sub4 = tr.getElementsByTagName("td")[7].innerText;
                sub5 = tr.getElementsByTagName("td")[8].innerText;
                sub6 = tr.getElementsByTagName("td")[9].innerText;

                console.log(fname, sub1, sub2, sub3, sub4, sub5, sub6);
                fnameEdit.value = fname;
                sub1Edit.value = sub1;
                sub2Edit.value = sub2;
                sub3Edit.value = sub3;
                sub4Edit.value = sub4;
                sub5Edit.value = sub5;
                sub6Edit.value = sub6;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                sno = e.target.id.substr(1);

                if (confirm("Are you sure you want to delete this student details!")) {
                    console.log("yes");
                    window.location = `5semresult.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                }
                else {
                    console.log("no");
                }
            })
        })

    </script>
</body>

</html>
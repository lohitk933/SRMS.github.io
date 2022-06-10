<?php  

session_start();
if(!isset($_SESSION['loggedin1']) || $_SESSION['loggedin1'] !==true)
{
    header("location: admin.php");
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
    $sql = "DELETE FROM `fdetails` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset( $_POST['snoEdit'])){
    // Update the record
      $sno = $_POST["snoEdit"];
      $fname = $_POST["fnameEdit"];
      $email = $_POST["emailEdit"];
      $number = $_POST["numberEdit"];
      $address = $_POST["addressEdit"];
      $username = $_POST["usernameEdit"];
      $qualification = $_POST["qualificationEdit"];
      $subject = $_POST["subjectEdit"];
      $gender = $_POST["genderEdit"];
      
    // Sql query to be executed
    $sql = "UPDATE `fdetails` SET `fname` = '$fname' , `email` = '$email', `number` = '$number', `address` = '$address', `username` = '$username', `qualification` = '$qualification', `subject` = '$subject', `gender` = '$gender' WHERE `fdetails`.`sno` = $sno";
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

    <title>Edit_Details</title>

</head>

<body>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Student Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="fedit.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">

                        <div class="col-md-8 my-1 mb-3">
                            <label for="inputName" class="form-label">Enter The Full Name</label>
                            <input type="text" name="fnameEdit" id="fnameEdit" aria-label="First name"
                                class="form-control" placeholder="Enter The Full name">
                        </div>
                        <div class="col-8 my-1 mb-3">
                            <label class="form-label">Email</label>
                            <input style="text-transform: lowercase" type="email" name="emailEdit" class="form-control"
                                id="emailEdit" placeholder="Enter The Email">
                            <label for="inputNumber" class="form-label">Mobile Number</label>
                            <input type="number" name="numberEdit" class="form-control" id="numberEdit" maxlength="10"
                                placeholder="Enter the Contact Number">
                        </div>
                        <div class="col-12 my-1 mb-3">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" name="addressEdit" class="form-control" id="addressEdit"
                                placeholder="House_no or Apartment_no, Street, Area, City, state">
                        </div>
                        <div class="col-6 my-1 mb-3">
                            <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
                            <div class="input-group">
                                <div class="input-group-text">@</div>
                                <input style="text-transform: lowercase" type="text" name="usernameEdit"
                                    class="form-control" id="usernameEdit" placeholder="Username">
                            </div>
                        </div>
                        <div class="input-group col-6 my-3 mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Qualification</label>
                            <select class="form-select" name="qualificationEdit" id="qualificationEdit">
                                <option selected>PUC</option>
                                <option>Degree</option>
                                <option>Masters</option>
                                <option>PHD</option>
                            </select>
                        </div>
                        <div class="input-group col-6 my-3 mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Subject</label>
                            <select class="form-select" name="subjectEdit" id="subjectEdit">
                                <option selected>DBMS</option>
                                <option>UNIX</option>
                                <option>ATC</option>
                                <option>PYTHON</option>
                            </select>
                        </div>
                        <div class="input-group col-6 my-3 mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                            <select class="form-select" name="genderEdit" id="genderEdit">
                                <option selected>Male</option>
                                <option>Female</option>
                                <option>Prefer not</option>
                            </select>
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
        <a href="#" class="srms"><span>Update Faculty Details</span></a>
        <nav class="navbar">
            <ul>
                <li><a href="admin_db.php">Home</a></li>
                <li><a href="">Student</a>
                    <ul>
                        <a href="sinsert.php">Add_Details</a>
                        <a href="sedit.php">Edit_Details</a>
                    </ul>
                </li>
                <li><a href="fedit.php">Faculty</a>
                    <ul>
                        <a href="afedit.php">Applied to join</a>
                        <a href="finsert.php">Add Faculty</a>
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
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Username</th>
                    <th scope="col">Qualification</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
          $sql = "SELECT * FROM `fdetails`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['fname'] . "</td>
            <td>". $row['email'] . "</td>
            <td>". $row['number'] . "</td>
            <td>". $row['address'] . "</td>
            <td>". $row['username'] . "</td>
            <td>". $row['qualification'] . "</td>
            <td>". $row['subject'] . "</td>
            <td>". $row['gender'] . "</td>
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
                email = tr.getElementsByTagName("td")[1].innerText;
                number = tr.getElementsByTagName("td")[2].innerText;
                address = tr.getElementsByTagName("td")[3].innerText;
                username = tr.getElementsByTagName("td")[4].innerText;
                qualification = tr.getElementsByTagName("td")[5].innerText;
                subject = tr.getElementsByTagName("td")[6].innerText;
                gender = tr.getElementsByTagName("td")[7].innerText;

                console.log(fname, email, number, address, username, qualification, subject, gender);
                fnameEdit.value = fname;
                emailEdit.value = email;
                numberEdit.value = number;
                addressEdit.value = address;
                usernameEdit.value = username;
                qualificationEdit.value = qualification;
                subjectEdit.value = subject;
                genderEdit.value = gender;
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
                    window.location = `fedit.php?delete=${sno}`;
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
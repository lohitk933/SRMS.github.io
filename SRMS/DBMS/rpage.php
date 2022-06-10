<?php

session_start();

if(!isset($_SESSION['loggedin2']) || $_SESSION['loggedin2'] !==true)
{
    header("location: result.php");
}
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


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->
  <link rel="stylesheet" href="../Styles/rpage.css">
</head>

<body>

  <h3>
    <p><a class="nav-link" href="rpage.php">@@</a>Vivekananda Institute of Technology...<a class="nav-link"
        href="logout1.php">Logout</a></p><br>
    <?php echo "<br><br>Welcome ". $_SESSION['usn']?>!<br>This is your Result<br>Best Of Luck For Your Future.....
  </h3>
  <br><br>

  <div class="container my-4">
    <form action="" method="POST">
      <input type="text" name="usn" class="btn" placeholder="Enter the USN">
      <input type="submit" name="search" class="btn1" value="SEARCH BY USN">
    </form>
    <br>
    <br>
    <table class="table" id="myTable" border="10" cellspacing="2" width="1000">
      <thead>
        <tr>
          <th scope="col">Fname</th>
          <th scope="col">USN</th>
          <th scope="col">Sem</th>
          <th scope="col">Sec</th>
          <th scope="col">sub1</th>
          <th scope="col">sub2</th>
          <th scope="col">sub3</th>
          <th scope="col">sub4</th>
          <th scope="col">sub5</th>
          <th scope="col">sub6</th>
          <th scope="col">Total Marks</th>
          <th scope="col">Percentage</th>
          <th scope="col">Grade</th>
        </tr>
      </thead>

      <tbody>
        <?php
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
if(isset($_POST['search']))
{
    $usn = $_POST['usn'];
    $sql = "SELECT * FROM `result` WHERE usn='$usn'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
        $sno = 0;
        while($row = mysqli_fetch_assoc($result))
        {
          $sno = $sno + 1;     
          echo "<tr>
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
            <td>". $row['tmarks'] . "</td>
            <td>". $row['cent'] . "</td>
            <td>". $row['grade'] . "</td>
          </tr>";
        }
    }
    else
    {
      header("location: rpage.php?error=The Student result is not Declared--->");  
      // echo "The Student result is not Declared---> ". mysqli_error($conn);
    }
     
}
?>


      </tbody>
    </table>
  </div>

  <br>
  <br>
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
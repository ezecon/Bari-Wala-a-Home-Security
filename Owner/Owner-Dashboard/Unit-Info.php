<?php
// Start the session (this should be done at the beginning of every PHP page)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    header('Location: ');
    exit;
}
// Assuming the user is logged in and you have their user ID
$username1 = $_SESSION['username'];
///$email = $_SESSION['email'];

//echo $user_id;
// Database connection parameters
$servername = "localhost"; // Assuming your local server is on localhost
$username = "root";
$password = "";
$dbname = "bari_wala"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST["UName"];
  $rent=$_POST["rent"];
    $sql = "INSERT into house_info (username,unitno,status,rent) values ('$username1','$fullname','Empty','$rent')";
  
 
  //$sql = "Update  VALUES ('$fullname','$username','$email','$number', '$password')";

  if ($conn->query($sql) === TRUE) {
    header("location: http://localhost/Bari-Wala/Owner/Owner-Dashboard/check");
      //echo "Signup successful!";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Bari-Wala</title>
</head>

<body class="bgcheck">
  <!-- Header -->
  <section id="header">
    <div class="header container" >
      <div class="nav-bar">
        <div class="brand">
          <a href="http://localhost/Bari-Wala/Owner/Owner-Dashboard/profile.html">
            <h1 style="font-size: 20px;"><span>H</span>ouse O<span>wn</span>er</h1>
<p class="OwnerProfile">Mr. Econ</p>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
<li><a href="" data-after="Home">Log Out</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->
   
<br><br>
<br>
<br><br><br><br><br><br><br><br><br><br>
  <section id ="projects">
<div class="signin"> 

  <div class="content"> 

   <div class="brand">
   <h1>Room Information:</h1>
    </div>

   <form action="index.php" method="post" class="form">

    <div class="inputBox"> 

     <input type="text"id="UName"name="UName" > <i>Unit Name</i> 

    </div> 
    <div class="inputBox"> 

     <input type="text"id="UName"name="rent" > <i>Set Rent</i> 

    </div>
  
     <br>
<br>
    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Add"> 
    </div> 
   </form> 
   <a href="http://localhost/Bari-Wala/Owner/Owner-Dashboard/Unit-Status.php" type="button" class="cta">Mark as Done</a>
  </div> 

 </div>
</section>
<br><br><br>
<br><br> <br> <br><br> <br>
<!-- Footer -->
  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span>B</span>ari - </span>W<span>ala</h1>
      </div>
      <p>Copyright © 2023</p>
    </div>
  </section>
  <!-- End Footer -->
<!-- End Footer -->
<script src="app.js"></script></body>

</html>
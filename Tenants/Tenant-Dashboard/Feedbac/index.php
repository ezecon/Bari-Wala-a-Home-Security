<?php
// Start the session (this should be done at the beginning of every PHP page)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['tenant']) && !isset( $_SESSION['username']) ) {
    // Redirect the user to the login page if not logged in

    header('Location: google.com');
    exit;
}

$servername = "localhost"; // Assuming your local server is on localhost
$username = "root";
$password = "";
$dbname = "bari_wala"; // Database name


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
  die("Connection failed: ");
}

$tenant= $_SESSION["tenant"];
$owner= $_SESSION["username"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$feedback = $_POST["feedback"];

$sql = "INSERT into feedback (owner, tenant, feedback) values ('$owner','$tenant','$feedback')";
  
 
  //$sql = "Update  VALUES ('$fullname','$username','$email','$number', '$password')";

  if ($conn->query($sql) === TRUE) {
    header("location: #");
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
            <h1 style="font-size: 20px;"><span>B</span>ari-<span>W</span>ala</h1>
<p class="OwnerProfile">Mr. Econ</p>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
          <li><a href="http://localhost/Bari-Wala/Tenants/Tenant-Dashboard/index.php" data-after="Home">Back</a></li>
<li><a href="" data-after="Home">Log Out</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

<br><br>
<br>
<br><br><br><br><br><br><br>
<br><br><br><br><br>
  <section id ="projects">
<div class="signin"> 

  <div class="content"> 

   <div class="brand">
   <h1>Feed Back Form:</h1>
    </div>

   <form action="index.php" method="post" class="form">

    <div class="inputBox"> 

     <input type="text"id="UName"name="feedback" required> <i>Feed Back: </i> 

    </div> 
    

<br><br>
     <br>

    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Submit"> 
    </div> 
   </form> 

  </div> 

 </div>
</section><br><br><br>
<br><br><br><br><br>
<br><br><br>
<br><br><br><br><br>
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
<?php

session_start();

if (!isset($_SESSION['username'])) {
    
    header('Location: login.php'); 
    exit;
}

$username1 = $_SESSION['username'];

$servername = "localhost"; // Assuming your local server is on localhost
$username = "root";
$password = "";
$dbname = "bari_wala"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

$sql13 = "SELECT * FROM guard_info WHERE owner='$username1'";
$result13 = $conn->query($sql13);

if ($result13->num_rows > 0) {
    echo "<script>alert('Account Already Exists'); window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/GateCheck.php'</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming 'Bio' is the password input field name
    $password = password_hash($_POST["Bio"], PASSWORD_DEFAULT);

    // Fixing the SQL query syntax
    $sql = "INSERT INTO guard_info (owner, pass) VALUES ('$username1', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Account Created successfully'); window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/GateCheck.php'</script>";
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
  <link rel="stylesheet" href="Add/style.css">
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
<br><br><br><br>
<br><br>
<br>
<br><br><br><br>
  <section id ="projects">
<div class="signin"> 

  <div class="content"> 

   <div class="brand">
   <h1>Generate Password:</h1>
    </div>

   <form action="create_guard.php" method="post" class="form">

 <br>
    <div class="inputBox"> 

      <input type="password"id="Bio"name="Bio" > <i>Enter Password For Guard</i> 
 
     </div> 
  <br>
<br>

    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Create"> 
    </div> 
   </form> 

  </div> 

 </div>
</section>
<br><br><br><br><br>
<br>
<br><br><br><br><br><br>
<br>
<br><br><br><br>
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
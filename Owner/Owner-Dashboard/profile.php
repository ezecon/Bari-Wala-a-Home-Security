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
$columnValue1='';
$columnValue2= '';
$columnValue3= '';
$columnValue = '';
$bio= '';
$DoB = '';

// O
if ($conn->connect_error) 
{
    die("Connection failed: ");
}

$sql = "SELECT * FROM user_info WHERE username= '$username1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $columnValue1=$row['number'];
  $columnValue2=$row['address'];
  $columnValue3=$row['email'];
  $columnValue = $row['fullname'];
  $bio= $row['bio'];
  $DoB = $row['DoB'];

  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Bari-Wala</title>
</head>

<body class="bgcheck">
  <!-- Header -->
  <section id="header">
    <div class="header container" >
      <div class="nav-bar">
        <div class="brand">
          <a href="profile.php">
            <h1 style="font-size: 20px;"><span>H</span>ouse O<span>wn</span>er</h1>
            <br><div class="OwnerProfile">
            <?php
    // Check if the user is logged in
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h4> $username</h4>";
    } 
    ?>
</div>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
<li><a href="logout.php" data-after="Log out">Log Out</a></li>
<li><a href="index.php" data-after="Back">Back</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


 
<!-- About Section -->
<section id="about">
<div class="about container">
<div class="col-left">
<div class="about-img">
<?php
    // Fetch user information including photo_path from the database
    $photoPath='';
    $result3 = $conn->query("SELECT * FROM user_info WHERE username = '$username1'");
    if ($result3->num_rows > 0) {
        $row3 = $result3->fetch_assoc();
        $photoPath = $row3['photo_path'];
    }
    ?>
<img src="<?php echo  "Settings/".$photoPath; ?>" alt="owner image">
</div>
</div>
<div class="col-right">
<h1 class="section-title">About <span>Owner</span></h1>
<br><div class="OwnerProfile">
     <?php
  //utput the value
    echo "<h2>$columnValue</h2>";
    echo"<p >$bio</p>";
    echo "<p>Date of Birth: $DoB</p>";
    ?>
</div>
</div>
</div>
</section>
<!-- End About Section -->

<!-- Contact Section -->
<section id="contact">
<div class="contact container">
<div>
<h1 class="section-title">Other <span>Information</span></h1>
</div>
<div class="contact-items">
<div class="contact-item">
<div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
<div class="contact-info">
<h1>Phone</h1>
<?php
 
    echo "<h2>$columnValue1</h2>";
    ?>
</div>
</div>
<div class="contact-item">
<div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
<div class="contact-info">
<h1>Email</h1>
<?php
echo"<h2>$columnValue3</h2>";
?>
</div>
</div>
<div class="contact-item">
<div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
<div class="contact-info">
<h1>Address</h1>
<?php

echo "<h2>$columnValue2</h2>";
?>
</div>
</div>
</div><a href="Settings/settings.php" class="cta">Update Profile</a>
</div>
</section>
<!-- End Contact Section -->

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
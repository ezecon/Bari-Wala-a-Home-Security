<?php
// Start the session (this should be done at the beginning of every PHP page)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['tenant'])) {
    // Redirect the user to the login page if not logged in
    header('Location: ');
    exit;
}
// Assuming the user is logged in and you have their user ID
$owner = $_SESSION['username'];
$tenant = $_SESSION['tenant'];

//echo $user_id;
// Database connection parameters
$servername = "localhost"; // Assuming your local server is on localhost
$username = "root";
$password = "";
$dbname = "bari_wala"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: ");
}

?><!DOCTYPE html>
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
          <a href="profile.html">
            <h1 style="font-size: 20px;"><span>B</span>ari-<span>W</span>ala</h1>

          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
<li><a href="logout.php" data-after="Log Out">Log Out</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

<!-- Photography Section -->
<section id="projects">
<div class="projects container">
<div class="projects-header">
<h1 class="section-title">Tenant's <span>Dashboard</span></h1>
</div>

<div class="all-projects">
<div class="project-item">
<div class="project-info">
 <a href="info.php" class="refcol"><h1>My Info</h1></a>
<h2>Add/Update/Delete</h2>
</div>
<div class="project-img">
<img src="photos/3details.webp" alt="img">
</div>
</div>

<div class="project-item">

<div class="project-img">
<img src="photos/due.jpg" alt="img">
</div>
<div class="project-info">
  <a href="My-Dues.php" class="refcol"><h1>My Dues</h1></a>
  </div>
</div>
<div class="project-item">
<div class="project-info">
<a href="Feedbac" class="refcol"><h1>Complaint Box</h1></a>
</div>
<div class="project-img">
<img src="photos/complaint.jpg">
</div>
</div>

</div>
</div>
</section>
<!-- End Projects Section -->


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
<script src="app.js"> </script>


</html>
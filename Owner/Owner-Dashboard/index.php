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
$user_id = $_SESSION['username'];

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
<!---<p class="OwnerProfile">Mr. Econ</p>--->
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
<h1 class="section-title">Owner <span>Dashboard</span></h1>
</div>

<div class="all-projects">
<div class="project-item">
<div class="project-info">
 <a href="Unit-Status.php" class="refcol"><h1>Unit Status</h1></a>
<h2>Empty or Non-empty </h2>
<p>Checking the unit status that it is empty or non-empty</p>
</div>
<div class="project-img">
<img src="photos/3.jpg" alt="img">
</div>
</div>
<div class="project-item">
<div class="project-info">

<a href="Bill-Status.php" class="refcol"><h1>Bill</h1></a>
<h2>Monthly Bill </h2>
<p>Checking that tenants have cleared  their bill or not  and also update the bbill sstatus</p>
</div>
<div class="project-img">
<img src="photos/3.jpeg" alt="img">
</div>
</div>
<div class="project-item">
<div class="project-info">
<a href="Tenant_Info/index.php" class="refcol"><h1>Tenant Information</h1></a>
<h2>Infomations of family members</h2>
<p>Checking information of family members of each unit and update their informations</p>
</div>
<div class="project-img">
<img src="photos/1.jpg">
</div>
</div>
<div class="project-item">
<div class="project-info">
  <a href="Feedback.php" class="refcol"><h1>Feedback Reports</h1></a>
<h2>Feedbacks of tenants</h2>
<p>Checking feedbacks of tenant where they are submitting their problems</p>
</div>
<div class="project-img">
<img src="photos/2.jpg" alt="img">
</div>
</div>
<div class="project-item">
<div class="project-info">
  <a href="GateCheck.php" class="refcol"><h1>Gate Check</h1></a>
<h2>In-Out record of outers.</h2>
<p>Checking time of in-out of people who are not their tenants, are entering the house. Thats it</p>
</div>
<div class="project-img">
<img src="photos/4.jpg" alt="img">
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
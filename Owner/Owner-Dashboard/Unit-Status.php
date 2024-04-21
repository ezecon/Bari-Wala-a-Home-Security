<?php
// Start the session (this should be done at the beginning of every PHP page)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    header('Location: ');
    exit;
}
//echo $_SESSION['username'];
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

$sql = "SELECT unitno, status, rent FROM house_info WHERE username= '$username1'";
$result = $conn->query($sql);

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
          <a href="profile.html">
            <h1 style="font-size: 20px;"><span>H</span>ouse O<span>wn</span>er</h1>

          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
<li><a href="Add\delete.php" data-after="Log Out">Delete Unit</a></li>
<li><a href="Check\index.php" data-after="Log Out">Add Unit</a></li>
<li><a href="logout.php" data-after="Log Out">Log Out</a></li>
<li><a href="index.php" data-after="Back">Back</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

  <!-- Bill section--->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Uni<span>t S</span>tatus</h1>
        <p>Empty or Filled!</p>
      </div> 
	<div style="text-align: center; font-size:medium; " id="services container2">
  <?php
if ($result->num_rows > 0) {
  echo '<table>';
  
  // Display header row
  echo '<thead><tr><th>Unit No</th><th>Status</th><th>House Rent</th></tr></thead>';
  
  // Display data rows
  echo '<tbody>';
  while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . htmlspecialchars($row['unitno']) . '</td>';
      echo '<td>' . htmlspecialchars($row['status']) . '</td>';
      echo '<td>' . htmlspecialchars($row['rent']) . '</td>';
      echo '</tr>';
  }
  echo '</tbody>';
  
  echo '</table>';
} else {
  echo 'No rows found.';
}
?>
     </div>
<br><br><br>
<div class="inpu"> 

        <a href="Add/index.php" type="button" class="cta">Add Tenants+</a>
        <a href="Add/index_.php" type="button" class="cta">Remove Tenants-</a>
      </div> 
 </div>
    </div>
  </section>
  <!-- End  Section -->

 

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
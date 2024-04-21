<?php

session_start();

if (!isset($_SESSION['username'])) {

    header('Location: ');
    exit;
}

$user_id = $_SESSION['username'];

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "bari_wala"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: ");
}
$sql1 = "SELECT unitno from billstatus where month ='ved'";
$result1 = $conn->query($sql1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$st= $_POST["st_date"];
$end = $_POST["end_date"];

//$sql = "SELECT unitno from house_info where username = '$user_id'";
//$result = $conn->query($sql);
//$check=$_POST["OPTION"];

  $sql1="SELECT * FROM guard WHERE date>= '$st' AND date<='$end' AND owner ='$user_id'";

$result1 = $conn->query($sql1);
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
          <a href="profile.html">
            <h1 style="font-size: 20px;"><span>H</span>ouse O<span>wn</span>er</h1>

          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
          <li><a href="create_guard.php" data-after="Gen Account">Generate Account</a></li>
<li><a href="" data-after="Log Out">Log Out</a></li>
<li><a href="index.php" data-after="Back">Back</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

  <br><br><br>
<!---start of--->

<section id="online-order">
  <div id="services">
<div class="signin"> 

  <div class="content"> 

  <div class="service-top">
        <h1 class="section-title" style="padding-top:60px;">Gat<span>e C</span>heck</h1>
  </div>

 <br><br><br>
    
<form action="GateCheck.php" method="POST" class="form">
 
<div class="inputBox"> 

  <input type="date"id="st_date"name="st_date" > <i>Start Date</i> 

 </div> 

 <div class="inputBox">
  <input type="date"id="end_date"name="end_date"><i>End Date</i>
 </div>

<div class="inputBox"> 

  <input type="submit" class="button"id="confirm" value="Check"> 
</div> 


<div style="text-align: center; font-size:medium; " id="services container2">
  <?php
if ($result1->num_rows > 0 ) {
  echo '<table>';
  
  // Display header row
  echo '<thead><tr><th>Name</th><th>Time</th><th>Destination</th></tr></thead>';
  
  // Display data rows
  echo '<tbody>';
  while ($row = $result1->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . htmlspecialchars($row['name']) . '</td>';
      echo '<td>' . htmlspecialchars($row['time']) . '</td>';
      echo '<td>'. htmlspecialchars($row['destination']) . '</td>';
      echo '</tr>';
  }
  echo '</tbody>';
  
  echo '</table>';
} else {
  echo 'No rows found.';
}
?>
</div>
</form> 



  </div> 

 </div>
 </div>
</section>

 
<br><br><br><br><br>
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
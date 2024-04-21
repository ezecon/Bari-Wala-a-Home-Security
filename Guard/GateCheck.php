<?php

session_start();

if (!isset($_SESSION['guard'])) {

    header('Location: google.com');
    exit;
}

$user_id = $_SESSION['guard'];

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "bari_wala"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: ");
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
$name = $_POST["name"];
$time = $_POST["time"];
$dest = $_POST["dest"];
$date = $_POST["date"];


$sql1="INSERT INTO guard(name, owner, time, destination, date) VALUES ('$name','$user_id','$time','$dest','$date')";

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
            <h1 style="font-size: 20px;"><span>B</span>ari -<span> W</span>ala</h1>

          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
          <li><a href="logout.php" data-after="Home">Log Out</a></li>
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
  <input type="text"id="end_date"name="name"><i>Name</i>
</div>
<div class="inputBox"> 

  <input type="time"id="st_date"name="time" > <i>time</i> 

 </div> 

 <div class="inputBox">
  <input type="date"id="end_date"name="date"><i>Date</i>
</div>
<div class="inputBox">
  <input type="text"id="end_date"name="dest"><i>Destination</i>
</div>


<div class="inputBox"> 

  <input type="submit" class="button"id="confirm" value="Submit"> 
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
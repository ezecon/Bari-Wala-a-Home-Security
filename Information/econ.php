<?php

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
$username1 = $_POST["owner"];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //$username1 = $_POST["owner"];
    $sql = "SELECT * FROM user_info WHERE username= '$username1'";
    $sql1 = "SELECT unitno, status,rent FROM house_info WHERE username= '$username1'";
$result2 = $conn->query($sql1);
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
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Welcome to Bari-Wala</title>
</head>

<body >
<!-- Header -->
<section id="header">
<div class="header container">
<div class="nav-bar">
<div class="brand">
<a href="#hero">
<h1 style="font-size: 20px;"><span>B</span>ari-<span>W</span>ala</h1>
</a>
</div>
<div class="nav-list">
<div class="hamburger">
<div class="bar"></div>
</div>
<ul>
<li><a href="#about" data-after="Home">Owner</a></li>
<li><a href="#contact" data-after="Contact">Contact</a></li>
<li><a href="#services" data-after="Service">Unit Info</a></li>

</ul>
</div>
</div>
</div>
</section>
<!-- End Header -->



<!-- About Section -->
<section id="about" style="background-color: #9c9b9b;">
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
<img src="<?php echo  "http://localhost/Bari-Wala/Owner/Owner-Dashboard/Settings/".$photoPath; ?>" alt="owner image">
</div>
</div>
<div class="col-right">
<h1 class="section-title">About <span>Owner</span></h1>
<br><div class="OwnerProfile">
     <?php
  //utput the value
    echo "<h2>$columnValue</h2>";
    echo"<p>$bio</p>";
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
</div>
</div>
</section>
<!-- End Contact Section -->
  <!-- Bill section--->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Uni<span>t S</span>tatus</h1>
        <p>Empty or Filled!</p>
      </div>
	<div style="text-align: center; font-size:medium; " id="services container2">
  <?php
if ($result2->num_rows > 0) {
  echo '<table>';
  
  // Display header row
  echo '<thead><tr><th>Unit No</th><th>Status</th><th>House Rent</th></tr></thead>';
  
  // Display data rows
  echo '<tbody>';
  while ($row = $result2->fetch_assoc()) {
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
 </div>
    </div>
  </section>
  <!-- End  Section -->
<!-- Hero Section -->
<!-- Footer -->
<section id="footer">
<div class="footer container">
<div class="brand">
<h1><span>B</span>ari-<span>W</span>ala</h1>
</div>
<div class="social-icon">
<div class="social-item">
<a href="https://www.facebook.com/econozzaman.econ"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
</div>
<div class="social-item">
<a href="https://www.instragram.com/ez_econ"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
</div>
<div class="social-item">
<a href="https://www.twitter.com/EconozzamanEcon"><img src="https://img.icons8.com/bubbles/100/000000/twitter.png" /></a>
</div>
<div class="social-item">
<a href="https://www.linkedin.com/econozzaman-econ/"><img src="https://img.icons8.com/bubbles/100/000000/linkedin.png" /></a>
</div>
</div>
<p>Copyright © 2023</p>
</div>
</section>
<!-- End Footer -->
<script src="app.js"></script>
<script src="https://www.drv.tw/inc/wd.js?s=wmc98ackzrzdz4ztpoai2g"></script></body>

</html>
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

// Database connection parameters
$servername = "localhost"; // Assuming your local server is on localhost
$username = "root";
$password = "";
$dbname = "bari_wala"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenantName = $_POST["Name"];
    $profession = $_POST["prof"];
    $dob = $_POST["date"];
    $unitno=$_SESSION['unitno'];

    // Handle file uploads for Tenant photo and NID/BC
    $tenantPhoto = $_FILES["tenantPhoto"]["name"];
    $tenantPhotoTmp = $_FILES["tenantPhoto"]["tmp_name"];
    $nidBcPhoto = $_FILES["nidBcPhoto"]["name"];
    $nidBcPhotoTmp = $_FILES["nidBcPhoto"]["tmp_name"];

    // Move uploaded photos to a secure location
    $tenantPhotoPath = "uploads/tenant_photos/" . basename($tenantPhoto);
    $nidBcPhotoPath = "uploads/nid_bc_photos/" . basename($nidBcPhoto);

    move_uploaded_file($tenantPhotoTmp, $tenantPhotoPath);
    move_uploaded_file($nidBcPhotoTmp, $nidBcPhotoPath);

    // Insert tenant information into the database
    $sql = "INSERT INTO tenant_info (unitno,owner_username, tenant_name, profession, dob, tenant_photo_path, nid_bc_photo_path) 
            VALUES ('$unitno','$username1', '$tenantName', '$profession', '$dob', '$tenantPhotoPath', '$nidBcPhotoPath')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Added');window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/Tenant_Info/check1.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
 
$conn->close();
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
   <h1><span>Tenant</span> Information:</h1>
    </div>

   <form action="check1.php" method="post" class="form"enctype="multipart/form-data">
   <div class="inputBox1">
        <input type="file" name="tenantPhoto" id="tenantPhoto" accept="image/*"><i>Choose a photo</i> 
</div>

    <div class="inputBox1"> 

     <input type="text"id="Name"name="Name" > <i>Tenant Name</i> 

    </div> 
 
    <div class="inputBox1"> 

     <input type="text"id="prof"name="prof" > <i>Profession</i> 

    </div> 
    <div class="inputBox1"> 

     <input type="date"id="date"name="date" > <i>Date of Birth</i> 

    </div> 
    <div class="inputBox1">
        <input type="file" name="nidBcPhoto" id="nidBcPhoto" accept="image/*"><i>Upload NID/BC</i> 
</div>
  
     <br>
<br>
    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Save"> 
    </div> 
   </form> 
   <a href="http://localhost/Bari-Wala/Owner/Owner-Dashboard/index.php" type="button" class="cta">Mark as Done</a>
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
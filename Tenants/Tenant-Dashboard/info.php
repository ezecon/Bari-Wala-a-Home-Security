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
$columnValue1='';
$conn = new mysqli($servername, $username, $password, $dbname);


$owner=$_SESSION['username'];
$tenant= $_SESSION['tenant'];
$sql3 = "SELECT unitno from house_info where tenant = '$tenant'";
$result4 = $conn->query($sql3);
$rr='';
if ($result4->num_rows > 0) {
  while ($row = $result4->fetch_assoc()) {
    $rr=$row['unitno'];
  }}
    $sql = "SELECT * FROM initial_info WHERE Owner ='$owner' and unitno='$rr'";
  
    $result1 = $conn->query($sql);
    $sql1 = "SELECT * FROM tenant_info WHERE owner_username ='$owner' and unitno ='$rr'";
  
    $result2 = $conn->query($sql1);
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
          <li><a href="index.php" data-after="Home">Back</a></li>
<li><a href="" data-after="Home">Log Out</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

  <section id="services">
    <div class="services container">
      <div class="service-top">

      <div class="service-top">
        <h1 class="section-title">Tenan<span>t I</span>nformation</h1>

      </div> 
      <br><br><br>
   <div style="text-align: left; font-size:medium; color: black; " id="services container2">
<h3 style="color: crimson;">Regular Information :</h3>
   <?php
if($columnValue1 =='#')
{
  echo"Select Unit No";
}
else{
if ($result1->num_rows > 0) {
  while ($row = $result1->fetch_assoc()) {

      echo "Unit No: ". htmlspecialchars($row['unitno'])."<br>" ;
      echo "Guardian: ". htmlspecialchars($row['tenant'])."<br>" ;
      echo "Address: ". htmlspecialchars($row['address'])."<br>" ;
      echo "Contact Number: ". htmlspecialchars($row['tel'])."<br>" ;
      echo "Reference Contact Number: ". htmlspecialchars($row['ref_tel'])."<br>" ;

 
  }
} 
$i=1;
if ($result2->num_rows > 0) {
  
echo '<br>'.'<h3 style="color: crimson;">Individual Information :</h3>';
  while ($row = $result2->fetch_assoc()) {

      $photo1=$row['tenant_photo_path'];
      $photo2=$row['nid_bc_photo_path'];
      echo "Member No: ". $i.'<br>';
      $i++;
      echo '';
      echo "Name: ". htmlspecialchars($row['tenant_name'])."<br>" ;
      echo "Profession: ". htmlspecialchars($row['profession'])."<br>" ;
      echo "Date of Birth: ". htmlspecialchars($row['dob'])."<br>" ;
      echo "Member photo: ".'<br>'.'<img src="'.'http://localhost/Bari-Wala/Owner/Owner-Dashboard/Tenant_Info/'.$photo1.'" alt=" image" width="200px">'.'<br>';
      echo "Member NID/BC: ".'<br>'.'<img src="'.'http://localhost/Bari-Wala/Owner/Owner-Dashboard/Tenant_Info/'.$photo2.'" alt=" image" width="200px">'.'<br>'.'<br>'.'<br>';
 
  }
} 
else {
  echo 'No rows found.';
}
}
?>
   </div>


 </div>
</section>
<br><br><br>
<br><br> <br> <br><br> <br>
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
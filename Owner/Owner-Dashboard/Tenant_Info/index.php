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
$columnValue1='';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $columnValue1 = $_POST["UName"];
    $sql = "SELECT * FROM initial_info WHERE Owner ='$username1' and unitno ='$columnValue1'";
  
    $result1 = $conn->query($sql);
    $sql1 = "SELECT * FROM tenant_info WHERE owner_username ='$username1' and unitno ='$columnValue1'";
  
    $result2 = $conn->query($sql1);
}
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
          <li><a href="https://services.nidw.gov.bd/nid-pub/claim-account" data-after="Check NID">Check NID</a></li>
          <li><a href="check.php" data-after="Home">Update Info</a></li>
          <li><a href="http://localhost/Bari-Wala/Owner/Owner-Dashboard/index.php" data-after="Home">Back</a></li>
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

   <form action="index.php" method="post" class="form">

    <div class="inputBox1"> 

     <input type="text"id="UName"name="UName" required> <i>Unit Name</i> 

    </div> 

  
     <br>
<br>
    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Search"> 
    </div> 
   </form> 
   <div style="text-align: left; font-size:medium; color: black; " id="services container2">
<h3 style="color: crimson;">Regular Information :</h3>
   <?php
if($columnValue1=='')
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
      echo "Member photo: ".'<br>'.'<img src="'.$photo1.'" alt=" image" width="200px">'.'<br>';
      echo "Member NID/BC: ".'<br>'.'<img src="'.$photo2.'" alt=" image" width="200px">'.'<br>'.'<br>'.'<br>';
 
  }
} 
else {
  echo 'No rows found.';
}
}
?>
   </div>


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
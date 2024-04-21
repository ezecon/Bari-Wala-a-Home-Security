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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //$fullname = $_POST["UName"];
  $Bio = $_POST["Bio"];
  $email = "";
  $number = "";
  $address = "Empty";
  $date = "";
 $y="";
 $sql = "UPDATE house_info
 SET tenant = '$y',
     status = '$address',
     tpass = '$date',
     temail = '$email',
     tnumber = '$number'
 WHERE username = '$username1' AND unitno = '$Bio'";

$sql1 ="DELETE FROM tenant_info WHERE unitno = '$Bio' AND owner_username = '$username1'";
$sql2 ="DELETE FROM initial_info WHERE unitno = '$Bio' AND owner = '$username1'";

$sql09="SELECT * FROM house_info where username='$username1' and unitno='$Bio'";
$resul09 = $conn->query($sql09);


$sql13= "SELECT unitno  from house_info where username='$username1' and unitno='$Bio'";
$result13 = $conn->query($sql13);

$sql12= "SELECT status from house_info where username='$username1' and unitno='$Bio'";
$temp='';
$result12 = $conn->query($sql12);
  if ($result12->num_rows > 0) {
      $row3 = $result12->fetch_assoc();
      $temp = $row3['status'];
  }
if($temp=="Empty")
{
  echo "<script>alert('That unit is already Empty');window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/Add/index_.php';</script>";
}
else if($result13->num_rows == 0)
{
  echo "<script>alert('That unit not found');window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/Add/index_.php';</script>";

}
else
{
  if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE&& $conn->query($sql2) === TRUE) {
    echo "<script>alert('Account deleted successfully'); window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/'</script>";
      //echo "Signup successful!";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
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
<p class="OwnerProfile">Mr. Econ</p>
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
<br><br><br><br>
<br><br>
<br>
<br><br><br><br>
  <section id ="projects">
<div class="signin"> 

  <div class="content"> 

   <div class="brand">
   <h1>Tenant Information:</h1>
    </div>

   <form action="index_.php" method="post" class="form">

 <br>
    <div class="inputBox"> 

      <input type="text"id="Bio"name="Bio" > <i>Unit No</i> 
 
     </div> 
  <br>
<br>

    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Remove"> 
    </div> 
   </form> 

  </div> 

 </div>
</section>
<br><br><br><br><br>
<br>
<br><br><br><br><br><br>
<br>
<br><br><br><br>
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
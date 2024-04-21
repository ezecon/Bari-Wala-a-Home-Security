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
  $fullname = $_POST["UName"];
  $Bio = $_POST["Bio"];
  $email = $_POST['email'];
  $number = $_POST['PhoneNumber'];
  $address = "Full";
  $date = password_hash($_POST["pass"], PASSWORD_DEFAULT);

  $sql1= "SELECT tenant from house_info where tenant='$fullname'";
  $result1 = $conn->query($sql1);

  $sql13= "SELECT unitno  from house_info where username='$username1' and unitno='$Bio'";
  $result13 = $conn->query($sql13);

  $sql2= "SELECT status from house_info where username='$username1' and unitno='$Bio'";
  $temp='';
  $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        $row3 = $result2->fetch_assoc();
        $temp = $row3['status'];
    }
  if ($result1->num_rows > 0)
  {
      echo "<script>alert('username already used');window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/Add/index.php';</script>";
  }
  else if($temp=="Full")
  {
    echo "<script>alert('That unit is already full');window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/Add/index.php';</script>";
  }
  else if($result13->num_rows == 0)
  {
    echo "<script>alert('That unit not found');window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/Add/index.php';</script>";

  }
  else
  {
  $sql = "UPDATE house_info
  SET 
      tenant = CASE WHEN '$fullname' IS NOT NULL THEN '$fullname' ELSE tenant END,
 
      status =  CASE WHEN '$address' IS NOT NULL THEN '$address' ELSE status END,
      tpass =  CASE WHEN '$date' IS NOT NULL THEN '$date' ELSE tpass END,
      temail =  CASE WHEN '$email' IS NOT NULL THEN '$email' ELSE temail END,
      tnumber =  CASE WHEN '$number' IS NOT NULL THEN '$number' ELSE tnumber END
  WHERE username ='$username1' and unitno='$Bio';
  ";
  //$sql = "Update  VALUES ('$fullname','$username','$email','$number', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Account Created Successfully');window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/';</script>";
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
  <section id ="projects">
<div class="signin"> 

  <div class="content"> 

   <div class="brand">
   <h1>Tenant Information:</h1>
    </div>

   <form action="index.php" method="post" class="form">

    <div class="inputBox"> 

     <input type="text"id="UName"name="UName" > <i>User Name</i> 

    </div> <br>
    <div class="inputBox"> 

      <input type="text"id="Bio"name="Bio" > <i>Unit No</i> 
 
     </div> 
  <br>
    <div class="inputBox"> 

     <input type="email"id="email"name="email" > <i>Email</i> 

    </div> 
 <br>
    <div class="inputBox"> 

      <input type="tel"id="PhoneNumber"name="PhoneNumber"  > <i>Phone Number</i> 
 
     </div> <br>
     <div class="inputBox"> 

      <input type="password"id="pass"name="pass"  > <i>Password</i> 
 
     </div> 
     <br>

    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Add"> 
    </div> 
   </form> 

  </div> 

 </div>
</section>
<br><br><br>
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
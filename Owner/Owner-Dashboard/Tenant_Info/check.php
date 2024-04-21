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
$_SESSION['unitno']='';
$_SESSION['guardian']='';
$_SESSION['add']='';
$_SESSION['refnum']='';
$_SESSION['num']='';
//echo $user_id;
// Database connection parameters
$servername = "localhost"; // Assuming your local server is on localhost
$username = "root";
$password = "";
$dbname = "bari_wala"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['unitno']= $_POST["UName"];
    $unitno =$_SESSION['unitno'];


    $_SESSION['guardian']= $_POST["Name"];
    $guardian = $_SESSION['guardian'];

    $_SESSION['add']= $_POST["add"];
    $add=$_SESSION['add'];

    $_SESSION['refnum']= $_POST["tel1"];
    $refnum=$_SESSION['refnum'];

    $_SESSION['num']= $_POST["tel"];
    $num=$_SESSION['num'];

    $sql13= "SELECT unitno  from house_info where username='$username1' and unitno='$unitno'";
    $result13 = $conn->query($sql13);

    if ($result13->num_rows == 0) 
    {
      echo "<script>alert('This Unitno Not Exist'); window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/Tenant_Info/check.php';</script>";
    }
    else
    {
      $sql = "INSERT INTO initial_info (unitno, tenant, owner, tel, ref_tel, address) VALUES ('$unitno','$guardian','$username1','$num','$refnum','$add')";

      if ($conn->query($sql) === TRUE) 
      {
        header("location: http://localhost/Bari-Wala/Owner/Owner-Dashboard/Tenant_Info/check1.php");
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

          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            
                    
<li><a href="index.php" data-after="Back">back</a></li>
<li><a href="" data-after="Log Out">Log Out</a></li>

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

   <form action="check.php" method="post" class="form">

    <div class="inputBox1"> 

     <input type="text"id="UName"name="UName" > <i>Unit Name</i> 

    </div> 
    <div class="inputBox1"> 

     <input type="text"id="Name"name="Name" > <i>Guardian</i> 

    </div> 
    <div class="inputBox1"> 

     <input type="address"id="add"name="add" > <i>Permanant Address</i> 

    </div> 
    <div class="inputBox1"> 

     <input type="tel"id="tel"name="tel" > <i>Contact number</i> 

    </div> 
    <div class="inputBox1"> 

<input type="tel"id="tel1"name="tel1" > <i>Ref Contact number</i> 

</div> 
  
     <br>
<br>
    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Save"> 
    </div> 
   </form> 
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
<?php
// Start the session (this should be done at the beginning of every PHP page)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    header('Location: index.php');
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

$columnValue1="#";
$columnValue2="#";
// O
if ($conn->connect_error) 
{
    die("Connection failed: ");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$result1 = '';
$result2 = $_POST['unitno'];
$columnValue1=$_POST["year"];
$columnValue2= $_POST["date"];

$sql13= "SELECT unitno from house_info where username='$username1' and unitno='$result2'";
$result13 = $conn->query($sql13);

if ($result13->num_rows == 0)
{
  echo "<script>alert('That unitno not exist');</script>";
}
else
{
  if($columnValue1!="#"&& $columnValue2!= "#")
  {
        $sql1 = "INSERT INTO billstatus(owner, unitno, year, month) VALUES ('$username1','$result2','$columnValue1','$columnValue2')";
        $result1 = $conn->query($sql1);
        echo "<script>alert('Updated');window.location.href='http://localhost/Bari-Wala/Owner/Owner-Dashboard/Clear_Bill.php';</script>";
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
  <link rel="stylesheet" href="css/style.css">
  <title>Bari-Wala</title>
</head>

<body class="bgcheck">
  <!-- Header -->
  <section id="header">
    <div class="header container" >
      <div class="nav-bar">
        <div class="brand">
          <a href="profile.php">
            <h1 style="font-size: 20px;"><span>B</span>ari - <span>W</span>ala</h1>

          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
<li><a href="logout" data-after="Log Out">Log Out</a></li>
<li><a href="Bill-Status.php" data-after="Back">Back</a></li>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

<br><br><br><br><br><br><br><br>
  <section id ="projects">
<div class="signin"> 

  <div class="content"> 

   <div class="brand">
   <h1>Bill  - <span>Clear</span></h1>
    </div>

   <form action="Clear_Bill.php" method="post" class="form">
 
   <div class="inputBox">
<select style="width: 200px; height: 50px; background-color: transparent; color: crimson; border-color: crimson;font-family: sans-serif; font-size: 18px; padding: 5px; margin: 10px;"name="year">
  <option value="#">Select Year</option><option value="2023">2023</option>
  <option
  value="2022">2022</option>
  <option
  value="2021">2021</option>
  <option
  value="2020">2020</option>
  <option
  value="2019">2019</option>
  <option
  value="2018">2018</option>
  <option
  value="2017">2017</option>
  <option
  value="2016">2016</option>
</select>
<select style="width: 200px; height: 50px; background-color: transparent; color: crimson; border-color: crimson; font-family: sans-serif; font-size: 18px; padding: 5px; margin: 10px;"name="date">
  <option value="#">Select Month</option>
<option 
  value="January">January
</option>
  <option
  value="February">February</option>
  <option
  value="March">March</option>
  <option
  value="April">April</option>
  <option
  value="May">May</option>
  <option
  value="June">June</option>
  <option
  value="July">July</option>
  <option
  value="Aug">Augest</option>
  <option value="sept">September</option>
  <option value="oct">October</option>
  <option value="nov">November</option>
  <option value="dec">December</option>
</select>
</div>
<div class="inputBox">
    <input type="text" name="unitno"><i>Enter Unit</i>
</div>
<br><br><br>
    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Update"> 
    </div> 
   </form> 
  </div> 

 </div>
</section>
<br><br><br><br><br><br><br><br><br>

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
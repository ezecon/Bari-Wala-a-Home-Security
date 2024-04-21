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
$result2 = '';
$columnValue1=$_POST["year"];
$columnValue2= $_POST["date"];
if($columnValue1!="#"&& $columnValue2!= "#")
{
  

      $sql1 = "SELECT unitno from billstatus where owner = '$username1' and year='$columnValue1' and month='$columnValue2'";
      $result1 = $conn->query($sql1);

      $sql2 = "SELECT unitno From house_info";

      $result2 = $conn->query($sql2);
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
<li><a href="index.php" data-after="Back">Back</a></li>
<li><a href="Clear_Bill.php" data-after="Clear Bill">Clear Bill</a></li>
  
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->

<br><br><br><br><br>
  <section id ="projects">
<div class="signin"> 

  <div class="content"> 

   <div class="brand">
   <h1>Bill  - <span>Status</span></h1>
    </div>

   <form action="Bill-Status.php" method="post" class="form">
 
   <div class="inputBox">
<select style="width: 250px; height: 50px; background-color: transparent; color: crimson; border-color: crimson;font-family: sans-serif; font-size: 18px; padding: 5px; margin: 10px;"name="year">
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
</div>
<div class=""inputBox>
  
<select style="width: 250px; height: 50px; background-color: transparent; color: crimson; border-color: crimson; font-family: sans-serif; font-size: 18px; padding: 5px; margin: 10px;"name="date">
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

      <input type="submit" class="button"id="update" value="Search"> 
    </div> 
   </form> 

   <div style="text-align: center; font-size:medium; " id="services container2">
<h3>Clear List :</h3>
  <?php
if($columnValue1=="#"|| $columnValue2== "#")
{
  echo"Select Month and Year";
}
else if($columnValue1=="#"&& $columnValue2== "#")
{
 echo"Select Month and Year";
}
else{
if ($result1->num_rows > 0) {

  echo '<table>';
  
  // Display header row
  echo '<thead><tr><th>Unit No</th><th>Status</th></tr></thead>';
  
  // Display data rows
  echo '<tbody>';
  while ($row = $result1->fetch_assoc()) {
      echo '<tr>';
      echo '<td>' . htmlspecialchars($row['unitno']) . '</td>';
        echo '<td style="color:green;">'.'Clear'. '</td>';
      
      echo '</tr>';
  }
  echo '</tbody>';
  
  echo '</table>';
} 

else {
  echo 'No rows found.';
}
}
?>
     </div>
     <div style="text-align: center; font-size:medium; " id="services container2">
<h3>Due List :</h3>
<?php
if($columnValue1=="#"|| $columnValue2== "#")
{
  echo"Select Month and Year";
}
else if($columnValue1=="#"&& $columnValue2== "#")
{
 echo"Select Month and Year";
}
else{
if ($result2->num_rows > 0) {

  echo '<table>';
  
  // Display header row
  echo '<thead><tr><th>Unit No</th><th>Status</th></tr></thead>';
  
  // Display data rows
  echo '<tbody>';


  while ($row2 = $result2->fetch_assoc()) {
    $foundInResult1 = false; // Flag to check if $row2 is found in $result1

    // Reset the pointer of $result1 to the beginning on each iteration of $result2
    $result1->data_seek(0);

    while ($row1 = $result1->fetch_assoc()) {
        // Compare the rows from $result2 and $result1
        if ($row2['unitno'] == $row1['unitno']) {
            // If a match is found, set the flag and break out of the inner loop
            $foundInResult1 = true;
            break;
        }
    }

    // If $row2 is not found in $result1, echo it
    if (!$foundInResult1) {
        echo '<tr>';
        echo '<td>' . $row2['unitno'] . '</td>';
        echo '<td>' . 'Due' . '</td>';
        echo '</tr>';
    }
}
  echo '</tbody>';
  
  echo '</table>';
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
<br><br><br><br><br><br><br><br>

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
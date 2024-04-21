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
$tenant = $_SESSION['tenant'];
//echo $user_id;
// Database connection parameters
$servername = "localhost"; // Assuming your local server is on localhost
$username = "root";
$password = "";
$dbname = "bari_wala"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);
$sql3 = "SELECT unitno from house_info where tenant = '$tenant'";
$result4 = $conn->query($sql3);
$rr='';
if ($result4->num_rows > 0) {
  while ($row = $result4->fetch_assoc()) {
    $rr=$row['unitno'];
  }}
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
$result3 = '';
$result4 = '';
$result5 = '';
$result6 = '';
$result7 = '';
$result8 = '';
$result9 = '';
$result10 = '';
$result11= '';
$result12= '';
$columnValue1=$_POST["year"];
if($columnValue1!="#")
{
  

      $sql1 = "SELECT unitno from billstatus where year='$columnValue1' and month='January' and unitno='$rr' and owner='$username1'";
      $result1 = $conn->query($sql1);
      $sql2 = "SELECT unitno from billstatus where year='$columnValue1' and month='February'and unitno='$rr'and owner='$username1'";
      $result2 = $conn->query($sql2);
      $sql3 = "SELECT unitno from billstatus where year='$columnValue1' and month='March'and unitno='$rr'and owner='$username1'";
      $result3 = $conn->query($sql3);
      $sql4 = "SELECT unitno from billstatus where year='$columnValue1' and month='April'and unitno='$rr'and owner='$username1'";
      $result4 = $conn->query($sql4);
      $sql5 = "SELECT unitno from billstatus where year='$columnValue1' and month='May'and unitno='$rr'and owner='$username1'";
      $result5 = $conn->query($sql5);
      $sql6 = "SELECT unitno from billstatus where year='$columnValue1' and month='June'and unitno='$rr'and owner='$username1'";
      $result6 = $conn->query($sql6);
      $sql7 = "SELECT unitno from billstatus where year='$columnValue1' and month='July'and unitno='$rr'and owner='$username1'";
      $result7 = $conn->query($sql7);
      $sql8 = "SELECT unitno from billstatus where year='$columnValue1' and month='Aug'and unitno='$rr'and owner='$username1'";
      $result8 = $conn->query($sql8);
      $sql9 = "SELECT unitno from billstatus where year='$columnValue1' and month='sept'and unitno='$rr'and owner='$username1'";
      $result9 = $conn->query($sql9);
      $sql10 = "SELECT unitno from billstatus where year='$columnValue1' and month='oct'and unitno='$rr'and owner='$username1'";
      $result10 = $conn->query($sql10);
      $sql11 = "SELECT unitno from billstatus where year='$columnValue1' and month='nov'and unitno='$rr'and owner='$username1'";
      $result11= $conn->query($sql11);
      $sql12 = "SELECT unitno from billstatus where year='$columnValue1' and month='dec'and unitno='$rr'and owner='$username1'";
      $result12 = $conn->query($sql12);
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
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="css1/style.css">
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
   <h3 class="section-title">My  - <span>Due</span></h3>
    </div>

   <form action="My-Dues.php" method="post" class="form">
 
   <div class="inputBox">
<select style="width: 250px; height: 50px; background-color: transparent; color: crimson; border-color: crimson;font-family: sans-serif; font-size: 18px; padding: 5px; margin: 10px;"name="year">
  <option value="#">Select Year</option>
  <option value="2024">2024</option><option value="2023">2023</option>
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

    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Search"> 
    </div> 
   </form> 

     <div style="text-align: center; font-size:medium; " id="services container2">
<h3>Due List :</h3>
<?php
if($columnValue1=="#")
{
  echo"Select Year";
}

else{
echo '<table>';

  echo '<thead><tr><th>Month</th><th>Status</th></tr></thead>';
  
  // Display data rows
  echo '<tbody>';
    // If $row2 is not found in $result1, echo it
        echo '<tr>';
        echo '<td>' . 'January' . '</td>';

        if ($result1->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';


        echo '<tr>';
        echo '<td>' . 'February' . '</td>';

        if ($result2->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';

        echo '<tr>';
        echo '<td>' . 'March' . '</td>';

        if ($result3->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';


        echo '<tr>';
        echo '<td>' . 'April' . '</td>';

        if ($result4->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';


        echo '<tr>';
        echo '<td>' . 'May' . '</td>';

        if ($result5->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';

        echo '<tr>';
        echo '<td>' . 'June' . '</td>';

        if ($result6->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';


        echo '<tr>';
        echo '<td>' . 'July' . '</td>';

        if ($result7->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';


        echo '<tr>';
        echo '<td>' . 'Augest' . '</td>';

        if ($result8->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';

        echo '<tr>';
        echo '<td>' . 'September' . '</td>';

        if ($result9->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';


        echo '<tr>';
        echo '<td>' . 'October' . '</td>';

        if ($result10->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';


        echo '<tr>';
        echo '<td>' . 'November' . '</td>';

        if ($result11->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';

        echo '<tr>';
        echo '<td>' . 'December' . '</td>';

        if ($result12->num_rows > 0) {
          echo '<td>' . 'Clear' . '</td>';
        }
        else{
        echo '<td>' . 'Due' . '</td>';}
        echo '</tr>';



}
  echo '</tbody>';
  
  echo '</table>';

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
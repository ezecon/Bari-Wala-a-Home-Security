<?php

session_start();

if (!isset($_SESSION['username'])) {

    header('Location: ');
    exit;
}

$user_id = $_SESSION['username'];

$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "bari_wala"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Connection failed: ");
}
$sql = "SELECT * from feedback where owner = '$user_id'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <title>Feedback Viewer</title>

</head>
<body>

        <header id="header">
            <div class="header container" >
              <div class="nav-bar">
                <div class="brand">
                  <a href="profile.html">
                    <h1 style="font-size: 20px;"><span>H</span>ouse O<span>wn</span>er</h1>
                    <?php
    // Check if the user is logged in
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h4> $username</h4>";
    } 
    ?>
                  </a>
                </div>
                <div class="nav-list">
                  <div class="hamburger">
                    <div class="bar"></div>
                  </div>
                  <ul>
        <li><a href="" data-after="Log Out">Log Out</a></li>
        <li><a href="index.php" data-after="Back">Back</a></li>
        
                  </ul>
                </div>
              </div>
            </div>
    </header>

    <main>
        <h2>Tenant's Says</h2>
        <br>
        <br>
        <div class="feedback-container">
            
              <?php
        
              while ($row = $result->fetch_assoc()) {
                echo'<div class="feedback-item">';
                echo '<h3>'."Name: " . htmlspecialchars($row['tenant']) . '</h3>';
                echo '<h3>'."Feedback: " . htmlspecialchars($row['feedback']) . '</h3>';
                echo'</div>';
              }


?>
 
    </main>

    <!-- Footer -->
  <footer id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span>B</span>ari - </span>W<span>ala</h1>
      </div>
      <p>Copyright © 2023</p>
    </div>
</footer>
  <!-- End Footer -->
<script src="app.js"> </script>

</body>
</html>
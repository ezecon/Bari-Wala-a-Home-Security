<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit;
}

$username1 = $_SESSION['username'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bari_wala";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["UName"];
    $Bio = $_POST["Bio"];
    $email = $_POST['email'];
    $number = $_POST['PhoneNumber'];
    $address = $_POST['address'];
    $date = $_POST['date'];

    // Handle file upload
    $targetDir = "photos/";
    $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the uploaded file is an image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('Sorry, Invalid Image format!.');</script>";
        $uploadOk = 0;
    }

    // Check file size (5MB limit)
    if ($_FILES["photo"]["size"] > 5000000) {
        echo "<script>alert('Sorry, Image file size should be less than 5 MB.');</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        // Move file to target directory
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
            // Update database with the new file path
            $photoPath = $targetFile;

            // Using prepared statement to prevent SQL injection
            $sql = $conn->prepare("UPDATE user_info
                                   SET 
                                       photo_path = ?,
                                       fullname = IFNULL(?, fullname),
                                       bio = IFNULL(?, bio),
                                       address = IFNULL(?, address),
                                       DoB = IFNULL(?, DoB),
                                       email = IFNULL(?, email),
                                       number = IFNULL(?, number)
                                   WHERE username = ?");

            $sql->bind_param("ssssssss", $photoPath, $fullname, $Bio, $address, $date, $email, $number, $username1);

            if ($sql->execute()) {
                header("location: http://localhost/Bari-Wala/Owner/Owner-Dashboard/profile.php");
            } else {
                echo "Error updating profile: " . $conn->error;
            }

            $sql->close();
        } else {
            echo "<script>alert('Sorry, Upload failed!.');</script>";
        }
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
  <link rel="stylesheet" href="css/style.css">
  <title>Bari-Wala</title>
</head>

<body class="bgcheck">
  <!-- Header --
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
  !-- End Header -->

<br>
  <section id ="projects">
<div class="signin"> 

  <div class="content"> 

   <div class="brand">
   <h1>Update Information:</h1>
    </div>

   <form action="settings.php" method="post" class="form" enctype="multipart/form-data">
 
<div class="inputBox">
        <input type="file" name="photo" id="photo" accept="image/*"><i>Choose a photo</i> 
</div>
    <div class="inputBox"> 

     <input type="text"id="UName"name="UName" > <i>Update Name</i> 

    </div> 
    <div class="inputBox"> 

      <input type="text"id="Bio"name="Bio" > <i>Bio</i> 
 
     </div> 
    <div class="inputBox"> 

     <input type="date"id="date"name="date" > <i> Date of Birth</i> 

    </div> 
    <div class="inputBox"> 

     <input type="email"id="email"name="email" > <i>Email</i> 

    </div> 
    <div class="inputBox"> 

     <input type="address"id="address"name="address" > <i>Address</i> 

    </div> 
    <div class="inputBox"> 

      <input type="tel"id="PhoneNumber"name="PhoneNumber"  > <i>Phone Number</i> 
 
     </div> 

    <div class="inputBox"> 

      <input type="submit" class="button"id="update" value="Update"> 
    </div> 
   </form> 

  </div> 

 </div>
</section>

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
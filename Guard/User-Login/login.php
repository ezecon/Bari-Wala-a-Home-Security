<?php
// Connect to your MySQL database
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bari_wala";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username= $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM guard_info WHERE owner='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["pass"])) {
            header("Location: http://localhost/Bari-Wala/Guard/GateCheck.php");
            $_SESSION['guard'] = $row['owner'];
           

            exit;
        } else {
            echo "<script>alert('Incorrect Password');window.location.href='http://localhost/Bari-Wala/Guard/User-Login/';</script>";
        }
    } else {
        echo "<script>alert('Incorrect User');window.location.href='http://localhost/Bari-Wala/Guard/User-Login/';</script>";
    }
}
?>

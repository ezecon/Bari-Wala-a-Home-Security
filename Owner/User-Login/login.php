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

    $sql = "SELECT username, password FROM user_info WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            header("Location: http://localhost/Bari-Wala/Owner/Owner-Dashboard/");
            $_SESSION['username'] = $row['username'];
           

            exit;
        } else {
            echo "Incorrect password";
        }
    } else {
        header("Location: http://localhost/Bari-Wala/Owner/User-Login/");
    }
}
?>

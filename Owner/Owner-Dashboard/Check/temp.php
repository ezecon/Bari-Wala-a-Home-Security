<?php
session_start();
// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bari_wala";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process signup form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["uname"];
    $username = $_SESSION["username"];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    $sql = "UPDATE INTO house_info (tenant,status,temail,tnumber, tpassword) VALUES ('$fullname','Full','$email','$number', '$password') where unitno='$unitno' and username='$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

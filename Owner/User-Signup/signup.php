<?php

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
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if (strpos($username, ' ') !== false) {
        echo "<script>alert('Username is not valid. It should not contain spaces.'); window.location.href='http://localhost/Bari-Wala/Owner/User-Signup/index.php';</script>";
    } else {
        // Validate password (more than 6 characters)
        if (strlen($_POST["password"]) < 6) {
            echo "<script>alert('Password is not valid. It should have more than 6 characters.'); window.location.href='http://localhost/Bari-Wala/Owner/User-Signup/index.php';</script>";
        } else {
            $sql1 = "SELECT username from user_info where username='$username'";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0) {
                echo "<script>alert('Username already used.'); window.location.href='http://localhost/Bari-Wala/Owner/User-Signup/index.php';</script>";
            } else {
                // Using prepared statement to prevent SQL injection
                $sql = $conn->prepare("INSERT INTO user_info (fullname, username, email, number, password) VALUES (?, ?, ?, ?, ?)");
                $sql->bind_param("sssss", $fullname, $username, $email, $number, $password);

                if ($sql->execute()) {
                    echo "<script>alert('Account created successfully'); window.location.href='http://localhost/Bari-Wala/Owner/User-Login/index.php';</script>";
                } else {
                    echo "<script>alert('Error creating account. Please try again later.'); window.location.href='http://localhost/Bari-Wala/Owner/User-Signup/index.php';</script>";
                }

                $sql->close();
            }
        }
    }
}

$conn->close();
?>

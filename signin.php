<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farm_easy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

// Replace with your actual database connection
$conn = new mysqli('localhost', 'root', '', 'farm_easy');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    echo "Sign In Successful. Welcome $username!";
} else {
    echo "Invalid Username or Password";
}

$conn->close();
?>

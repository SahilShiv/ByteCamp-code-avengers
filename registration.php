<?php
$servername = "localhost"; // XAMPP default host
$username = "root"; // Default username
$password = ""; // Default password (empty in XAMPP)
$dbname = "eco_sync"; // Your database name

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$aadhar = $_POST['aadhar'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

// SQL query to insert data into the table
$sql = "INSERT INTO users (full_name, email, username, gender, age, aadhar, phone, address, password) 
        VALUES ('$full_name', '$email', '$username', '$gender', '$age', '$aadhar', '$phone', '$address', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registration successful!'); window.location.href='index.html';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.history.back();</script>";
}

// Close the connection
$conn->close();
?>

<?php

// session start here...
session_start();

// get all 3 strings from the form (and scrub w/ validation function)
include 'validate.php';
$endUser = test_input($_POST['user']);
$userPwd = test_input($_POST['pwd']);
$pwdRepeat = test_input($_POST['repeat']);

// make sure that the two password values match!
// create the password_hash using the PASSWORD_DEFAULT argument
if ($userPwd != $pwdRepeat) {
    header("location: register.php");
} else {
    $hashPwd = password_hash($userPwd, PASSWORD_DEFAULT);
}

// login to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softball";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = $conn->prepare("SELECT * FROM users WHERE username = '$endUser'");
$sql->execute();
$sql->store_result();

if ($sql->num_rows > 0) {
    header("location: register.php");
    exit();
} else {
    $sql = "INSERT INTO users (username, password) VALUES ('$endUser','$hashPwd')";
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "<br> <a href='index.php'>Main Menu</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
// insert username and password hash into db (put the username in the session
// or make them login)


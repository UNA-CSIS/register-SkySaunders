<?php
// start session
session_start();
include 'validate.php';
$uname = test_input($_POST['user']);
$uPwd = test_input($_POST['pwd']);

if (strlen($uname) < 1 || strlen($uPwd) < 1) {
    header("location:index.php");
    exit();
}

// login to the softball database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softball";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// select password from users where username = <what the user typed in>
$sql = "SELECT password FROM users WHERE username = '$uname'";
$result = $conn->query($sql);

// password_verify(password from form, password from db)
if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $verified = password_verify($uPwd, trim($row['password']));
        if ($verified) {
            $_SESSION['username'] = $uname;
            $_SESSION['error'] = '';
        } else {
            $_SESSION['error'] = 'invalid username or password';
        }
    }
    
    // if no rows, then username is not valid
} else {
    $_SESSION['error'] = 'invalid username or password';
}



$conn->close();
header("location:index.php");
?>

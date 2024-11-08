<?php
session_start();

if (isset($_SESSION['username'])) {
    $displayName = $_SESSION['username'];
} else {
    header("location: index.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softball";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<h2> Welcome, " . $displayName . "</h2>";
        
        $sql = "SELECT * FROM games order by id";
        $result = $conn->query($sql);

        echo "<table border='1'>
                <tr>
                <th>ID</th>
                <th>Opponent</th>
                <th>Site</th>
                <th>Result</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['opponent'] . "</td>";
            echo "<td>" . $row['site'] . "</td>";
            echo "<td>" . $row['result'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        $conn->close();
        ?>
    </body>
</html>

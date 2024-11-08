<?php
session_start()
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $displayName = "user";

        if (!isset($_SESSION['username'])) {
            echo "<h3> Welcome, please log in below </h3>";
        } else {
            $displayName = $_SESSION['username'];
            echo "<h3> Welcome, $displayName </h3>";
        }
        
        ?>
        <form action="authenticate.php" method="POST">
            Username: <input type="text" name="user"><br>
            Password: <input type="password" name="pwd"><br>
            <input type="submit"  value="Login">
        </form>
        <hr>
        <a href="register.php">Register a new login</a>
        <p>
            <a href="games.php">UNA NCAA Championship Season</a>
    </body>
</html>

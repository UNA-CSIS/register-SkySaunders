<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "Welcome, $username";
        }
        ?>
        <form action="authenticate.php" method="POST">
            Username: <input type="text" name="user"><br>
            Password: <input type="password" name="pwd"><br>
            <input type="submit">
        </form>
        <a href="register.php">Register a new login</a>
        <p>
        <a href="games.php">UNA NCAA Championship Season</a>
    </body>
</html>

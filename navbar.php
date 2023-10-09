<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>

<body>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = "your_username";
        $password = "your_password";

        $input_username = $_POST["username"];
        $input_password = $_POST["password"];

        if ($input_username === $username && $input_password === $password) {
            echo "<p>Login successful!</p>";
        } else {
            echo "<p>Login failed. Please try again.</p>";
        }
    }
    ?>

    <h2>Login</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

</body>

</html>
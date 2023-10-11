<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = "Admin"; 
    $password = "Acc#2023"; 

 
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

  
    if ($input_username == $username && $input_password == $password) {
     
        echo "<p>Login successful. Welcome, $username!</p>";
    } else {
      
        echo "<p>Invalid username or password. Please try again.</p>";
    }
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Login">
</form>

</body>
</html>

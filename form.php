<!DOCTYPE html>
<html>

<head>
    <title>PHP Form Example</title>
</head>

<body>

    <?php

    $name = $email = "";


    $name_error = $email_error = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $name_error = "Name is required";
        } else {
            $name = test_input($_POST["name"]);

            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $name_error = "Only letters and white space allowed";
            }
        }


        if (empty($_POST["email"])) {
            $email_error = "Email is required";
        } else {
            $email = test_input($_POST["email"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = "Invalid email format";
            }
        }
    }


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP Form Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name">
        <span class="error">* <?php echo $name_error; ?></span>
        <br><br>
        Email: <input type="text" name="email">
        <span class="error">* <?php echo $email_error; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php

    if ($name && $email) {
        echo "<h2>Your Input:</h2>";
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
    }
    ?>

</body>

</html>
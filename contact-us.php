<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
</head>

<body>
    <h1>Contact Us</h1>

    <?php
    $name = $email = $message = '';
    $nameErr = $emailErr = $messageErr = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = sanitize_input($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = sanitize_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["message"])) {
            $messageErr = "Message is required";
        } else {
            $message = sanitize_input($_POST["message"]);
        }

        if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
            $to = "contact@example.com";
            $subject = "Contact Us Form Submission";
            $headers = "From: $email";
            $mailBody = "Name: $name\nEmail: $email\nMessage:\n$message";
            mail($to, $subject, $mailBody, $headers);

            echo "<p>Your message has been sent. We will get back to you shortly.</p>";
        }
    }

    function sanitize_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <span class="error"><?php echo $nameErr; ?></span>
        <br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <span class="error"><?php echo $emailErr; ?></span>
        <br><br>

        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="4" cols="50"></textarea>
        <span class="error"><?php echo $messageErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>
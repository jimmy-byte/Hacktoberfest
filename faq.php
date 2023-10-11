<!DOCTYPE html>
<html>
<head>
    <title>FAQ Page</title>
</head>
<body>
    <h1>Frequently Asked Questions</h1>

    <?php
    
    $host = 'localhost';
    $username = 'wasana123';
    $password = '12345678';
    $database = 'newdb';
    
    $conn = new mysqli($host, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM faq";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";

        while ($row = $result->fetch_assoc()) {
            echo "<li><strong>" . $row['question'] . "</strong><br>" . $row['answer'] . "</li>";
        }

        echo "</ul>";
    } else {
        echo "No FAQ entries found.";
    }
    
    $conn->close();
    ?>
</body>
</html>

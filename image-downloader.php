<!DOCTYPE html>
<html>
<head>
    <title>Image Downloader</title>
</head>
<body>
    <h1>Download an Image</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $imageUrl = $_POST['image_url'];

        if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            
            $filename = uniqid() . '.jpg';
            
            if (file_put_contents($filename, file_get_contents($imageUrl))) {
                echo "Image downloaded successfully!";
            } else {
                echo "Failed to download the image.";
            }
        } else {
            echo "Invalid URL format.";
        }
    }
    ?>

    <form method="POST">
        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url" id="image_url" required>
        <input type="submit" value="Download Image">
    </form>
</body>
</html>

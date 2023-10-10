<!DOCTYPE html>
<html>

<head>
    <title>Video Uploader</title>
</head>

<body>
    <h1>Upload a Video</h1>

    <?php
    $uploadDir = 'uploads/';
    $allowedExtensions = ['mp4', 'avi', 'mov'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
            $fileName = $_FILES['video']['name'];
            $fileTmpName = $_FILES['video']['tmp_name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                $uploadPath = $uploadDir . $fileName;

                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    echo "Video uploaded successfully!";
                } else {
                    echo "Failed to upload video.";
                }
            } else {
                echo "Invalid file format. Allowed formats: " . implode(', ', $allowedExtensions);
            }
        } else {
            echo "Error uploading file.";
        }
    }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="video" accept="video/*" required>
        <input type="submit" value="Upload Video">
    </form>
</body>

</html>
<?php
// Check if the form is submitted and the upload button is pressed
if (isset($_POST['upload'])) {

    // Define the allowed file types for upload (JPEG, PNG, GIF)
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    // Define the maximum allowed file size (3MB in bytes)
    $maxFileSize = 3 * 1024 * 1024; // 3MB: B -> KB -> MB

    // Check if a file has been uploaded via the form
    if (isset($_FILES['image'])) {

        // Get the uploaded file's information
        $file = $_FILES['image'];              // The $_FILES array contains file details
        $fileName = basename($file['name']);   // Get the base name of the uploaded file (e.g., "image.jpg")
        $fileTmp = $file['tmp_name'];          // Get the temporary file name on the server
        $fileSize = $file['size'];             // Get the size of the uploaded file in bytes
        $fileType = mime_content_type($fileTmp); // Get the MIME (media) type of the uploaded file
        $uploadDir = 'uploads/';               // Define the directory where the file will be uploaded

        // Validate the file type to ensure it's a JPEG, PNG, or GIF
        if (!in_array($fileType, $allowedTypes)) {
            die('Invalid file type. Only JPEG, PNG, and GIF are allowed.'); // Stop php script execution
        }

        // Validate the file size to ensure it does not exceed the maximum allowed size
        if ($fileSize > $maxFileSize) {
            die('File size exceeds the maximum allowed size of 3MB.');
        }

        // Generate the target file path (where the file will be moved to)
        $targetFile = $uploadDir . $fileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($fileTmp, $targetFile)) {
            // If the file is successfully moved, show a success message and redirect
            echo 'File uploaded successfully!';
            header('Location: index.php'); // Redirect to the gallery page after successful upload
            exit; // Stop further execution after the redirect
        } else {
            // If there is an error moving the file, show an error message
            echo 'Error uploading the file.';
        }
    }
}

<?php

/*
Create a simple gallery system in PHP where users can upload images.
a) Once uploaded, the images should be stored on the server and displayed in a grid format on the webpage.
b) Ensure that only images of type JPEG, PNG, and GID are accepted, and enforce a maximum file size of 3MB
*/

// scandir: scan the 'uploads' directory and return an array of filenames and directories, including '.' and '..'
// array-diff: remove the '.' and '..' entries from the array returned by scandir
$images = array_diff(scandir('uploads'), array('.', '..'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Image Gallery</h1>

    <!-- Image Upload Form -->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/jpeg, image/png, image/gif" required>
        <button type="submit" name="upload">Upload Image</button>
    </form>

    <hr>

    <!-- Display Images -->
    <div class="gallery">
        <?php foreach ($images as $image): ?>
            <div class="gallery-item">
                <img src="uploads/<?= $image ?>" alt="<?= $image ?>">
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>
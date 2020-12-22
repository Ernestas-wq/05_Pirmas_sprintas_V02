<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/css/main.min.css">
    <title>File browser</title>
</head>

<body>
    <div class="background-container">
        <div class="container">
            <h1>Your file browser</h1>

            <img src="assets/img/moon.png" alt="">
            <div class="stars"></div>
            <div class="twinkling"></div>
            <div class="clouds"></div>
            <h3 class="error" id="new_dir_error"></h3>
            <?php
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


            echo '<form action="index.php" method="POST" class="utility">
                <button class="squareBtn" type="submit">Back to browsing</button>
                </form>
            ';

            if (isset($_POST["confirmUpload"])) {
                // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                // if ($check !== false) {
                //     echo "File is an image - " . $check["mime"] . ".";
                //     $uploadOk = 1;
                // } else {
                //     echo "File is not an image.";
                //     $uploadOk = 0;
                // }
                // }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo '<h3 class="utility__message"> Sorry, file already exists.</h3>';
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo '<h3 class="upload_message">Sorry, your file is too large.</h3>';
                $uploadOk = 0;
            }



            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo '<h3  class="upload_message">Sorry, your file was not uploaded.</h3>';
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo '<h3 class="upload_message">The file <span>
            ' . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . '
            </span> has successfully uploaded.</h3>';
                } else {
                    echo '<h3 class="upload_message">Sorry, there was an error uploading your file.</h3>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
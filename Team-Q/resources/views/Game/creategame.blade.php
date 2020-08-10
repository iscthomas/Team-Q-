<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- https://www.codeofaninja.com/2011/12/php-and-mysql-crud-tutorial.html code adapted from this source -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create Game</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Styles -->
</head>

<?php
if ($_POST) {

    // include database connection
    include 'config/database.php';

    try {

        // insert query
        $query = "INSERT INTO games SET name=:name, category=:category, description=:description, image=:image, created=:created";

        // prepare query for execution
        $stmt = $con->prepare($query);

        // posted values
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $category = htmlspecialchars(strip_tags($_POST['category']));
        $description = htmlspecialchars(strip_tags($_POST['description']));

        // new 'image' field
        $image = !empty($_FILES["image"]["name"])
            ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"])
            : "";
        $image = htmlspecialchars(strip_tags($image));

        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);

        // specify when this record was inserted to the database
        $created = date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);

        // Execute the query
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Game added.</div>";

            // now, if image is not empty, try to upload the image
            if ($image) {
                // sha1_file() function is used to make a unique file name
                $target_directory = "/Team-Q/public/images/games/";
                $target_file = $target_directory . $image;
                $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

                // error message is empty
                $file_upload_error_messages = "";

                // make sure that file is a real image
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    // submitted file is an image
                } else {
                    $file_upload_error_messages .= "<div>Submitted file is not an image.</div>";
                }
                // make sure certain file types are allowed
                $allowed_file_types = array("jpg", "jpeg", "png", "gif");
                if (!in_array($file_type, $allowed_file_types)) {
                    $file_upload_error_messages .= "<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
                }
                // make sure file does not exist
                if (file_exists($target_file)) {
                    $file_upload_error_messages .= "<div>Image already exists. Try to change file name.</div>";
                }
                // make sure submitted file is not too large, can't be larger than 5 MB
                if ($_FILES['image']['size'] > (5120000)) {
                    $file_upload_error_messages .= "<div>Image must be less than 5 MB in size.</div>";
                }
                // make sure the 'uploads' folder exists
                // if not, create it
                if (!is_dir($target_directory)) {
                    mkdir($target_directory, 0777, true);
                }
                // if $file_upload_error_messages is still empty
                if (empty($file_upload_error_messages)) {
                    // it means there are no errors, so try to upload the file
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        // it means photo was uploaded
                    } else {
                        echo "<div class='alert alert-danger'>";
                        echo "<div>Unable to upload photo.</div>";
                        echo "<div>Update the record to upload photo.</div>";
                        echo "</div>";
                    }
                }

                // if $file_upload_error_messages is NOT empty
                else {
                    // it means there are some errors, so show them to user
                    echo "<div class='alert alert-danger'>";
                    echo "<div>{$file_upload_error_messages}</div>";
                    echo "<div>Update the record to upload photo.</div>";
                    echo "</div>";
                }
            }
        } else {
            echo "<div class='alert alert-danger'>Unable to add game.</div>";
        }
    }

    // show error
    catch (PDOException $exception) {
        die('ERROR: ' . $exception->getMessage());
    }
}
?>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Add Game</h1>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Game Title</td>
                    <td><input type='text' name='name' class='form-control' placeholder="Enter Game Title..." /></td>
                </tr>
                <tr>
                <tr>
                    <td>Game Category/Genre</td>
                    <td><input type='text' name='category' class='form-control' placeholder="Enter Game Genre..." /></td>
                </tr>
                <tr>
                    <td>Game Description</td>
                    <td><textarea name='description' class='form-control' placeholder="Enter Game Description..."></textarea></td>
                </tr>
                <tr>
                    <td>Image (Limit 5MB)</td>
                    <td><input type='file' name='image' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Add Game' class='btn btn-primary' />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
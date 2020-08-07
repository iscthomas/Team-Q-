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
        $query = "INSERT INTO games SET name=:name, description=:description, image=:image, created=:created";

        // prepare query for execution
        $stmt = $con->prepare($query);

        // posted values
        $name = htmlspecialchars(strip_tags($_POST['name']));
        $description = htmlspecialchars(strip_tags($_POST['description']));
        $price = htmlspecialchars(strip_tags($_POST['image']));

        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':iamge', $image);

        // specify when this record was inserted to the database
        $created = date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);

        // Execute the query
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Game added.</div>";
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

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Game Title</td>
                    <td><input type='text' name='name' class='form-control' placeholder="Enter Game Title..." /></td>
                </tr>
                <tr>
                    <td>Game Description</td>
                    <td><textarea name='description' class='form-control' placeholder="Enter Game Description..."></textarea></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type='file' name='price' class='form-control' /></td>
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
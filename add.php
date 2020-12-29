<?php
require "config.php";
if($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO todo (title,description) VALUES (:title,:description)";
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute(
        array(
            ':title' => $title ,
            ':description' => $desc
        )
    );
    if($result) {
        echo "<script>
            alert('New todo is added');
            window.location.href='index.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>
                Create New Tasks
            </h2>

            <form action="add.php"method="post">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text"id="title"class="form-control"name="title">
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description"class="form-control"></textarea>
                    <div class="form-text">Fill your description.</div>
                </div>
                <button class="btn btn-primary">Submit</button>
                <a href="index.php"class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</body>
</html>
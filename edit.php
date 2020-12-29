<?php
require "config.php";

if($_POST){
    $title = $_POST['title'];
    $desc = $_POST ['description'];
    $id = $_POST['id'];
    
    $pdostatement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
    $result = $pdostatement->execute();

    if($result) {
        echo "<script>
            alert('New todo is succefully updated');
            window.location.href='index.php';
            </script>";
    }

}else{
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit task </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>
                Edit Tasks
            </h2>

            <form action=""method="post">
            <input type="hidden"name="id"value="<?php echo $result[0]['id']; ?>">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text"name="title"class="form-control"value="<?php echo $result[0]['title']; ?>">
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description"class="form-control"><?php echo $result[0]['description']; ?></textarea>
                    <div class="form-text">Fill your description.</div>
                </div>
                <button class="btn btn-primary">Update</button>
                <a href="index.php"class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</body>
</html>

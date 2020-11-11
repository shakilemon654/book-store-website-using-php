<?php
require_once("functions.php");

$errors = [];
$title = "";
$grade = "";
$isRead = "";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $grade = isset($_POST["grade"]) ? $_POST["grade"] : "";
    $isRead = isset($_POST["isRead"]) ? $_POST["isRead"] : "";
    echo $grade;



    if(strlen($title) < 3 || strlen($title) > 23){
        $errors[] = "Title characters must be between 3 to 23";
    }

    if (empty($errors)){
        addBook($title, $grade, $isRead);
        header("Location: index.php?message=New+book+has+been+added");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Add book</title>
</head>
<body>
    <nav class="navbar">
        <h3><a id="book-list-link" href="index.php">Books</a></h3>
        <h3><a id="book-form-link" href="add-book.php">Add book</a></h3>
        <h3><a id="author-list-link" href="authors.php">Authors</a></h3>
        <h3><a id="author-form-link" href="add-author.php">Add author</a></h3>
        
    </nav>
    <div class="form-div add-book-div">
        <div id="error-block">
            <ul class="list-unstyled">
            <?php foreach($errors as $error): ?>
                <li class="alert alert-danger"><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
        </div>

        <form id="form" action="add-book.php" method="POST">
            <table>
                <tr>
                    <td><label for="title"><h3>Title:</h3></label></td>
                    <td><input type="text" id="title" name="title" class="form-control" value="<?= $title ?>" placeholder="Enter your book name" size="50" required></td>
                </tr>

                </tr>
                <tr>
                    <td><h3>Grade:</h3></td>
                    <td>
                        <input type="radio" name="grade" value="1" <?= ($grade == 1) ? "checked" : ""; ?>>
                        <label for="">1</label>
                        <input type="radio" name="grade" value="2" <?= ($grade == 2) ? "checked" : ""; ?>>
                        <label for="">2</label>
                        <input type="radio" name="grade" value="3" <?= ($grade == 3) ? "checked" : ""; ?>>
                        <label for="">3</label>
                        <input type="radio" name="grade" value="4" <?= ($grade == 4) ? "checked" : ""; ?>>
                        <label for="">4</label>
                        <input type="radio" name="grade" value="5" <?= ($grade == 5) ? "checked" : ""; ?>>
                        <label for="">5</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="isRead"><h3>Read:</h3></label></td>
                    <td><input type="checkbox" name="isRead" value="1"  <?= ($isRead == 1) ? "checked" : ""; ?>></td>
                </tr>
            </table>
            <div class="btn-position-div">
                <input type="submit" name="submitButton" id="submitButton" value="Add Book" class="submit-button">
            </div>
        </form>

    </div>
   <footer>
       <h3>ICD007: Add new book</h3>
   </footer>
</body>
</html>

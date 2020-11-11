<?php
require_once("functions.php");

$errors = [];
$firstName = "";
$lastName = "";
$grade = "";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
    $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
    $grade = isset($_POST["grade"]) ? $_POST["grade"] : "";

    if (strlen($firstName) < 1 || strlen($firstName) > 21){
        $errors[] = "First name characters must be between 1 to 21";
    }

    if (strlen($lastName) < 2 || strlen($lastName) > 22){
        $errors[] = "Surname characters must be between 2 to 22";
    }

    if (empty($errors)){
        addAuthor($firstName, $lastName, $grade);
        header("Location: authors.php?message=Author+name+has+been+added");
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
    <title>Add author</title>
</head>
<body>
    <nav class="navbar">
        <h3><a id="book-list-link" href="index.php">Books</a></h3>
        <h3><a id="book-form-link" href="add-book.php">Add book</a></h3>
        <h3><a id="author-list-link" href="authors.php">Authors</a></h3>
        <h3><a id="author-form-link" href="add-author.php">Add author</a></h3>
    </nav>
    
    <div class="form-div">
        <div id="error-block">
            <ul class ="list-unstyled">
            <?php foreach($errors as $error): ?>
                <li class="alert alert-danger"><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
        </div>

        <form id="form" action="add-author.php" method="POST">
            <table>
                <tr>
                    <td><label for="firstName"><h3>First name:</h3></label></td>
                    <td><input class="form-control" type="text" name="firstName" id="firstName" value="<?= $firstName ?>" placeholder="Enter author first name"  size="40" ></td>
                </tr>
                <tr>
                    <td><label for="lastName"><h3>Surname:</h3></label></td>
                    <td><input class="form-control" type="text" name="lastName" id="lastName" value="<?= $lastName ?>" placeholder="Enter author surname"  size="40"></td>
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
            </table>
            <div class="btn-position-div">
                <input type="submit" name="submitButton" id="submitButton" value="Add Author" class="submit-button">
            </div>
        </form>

    </div>
   <footer>
       <h3>ICD007: Add new author</h3>
   </footer>
</body>
</html>
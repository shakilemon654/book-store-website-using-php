<?php
require_once("functions.php");

$errors = [];
$authors = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["submitButton"]){
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $grade = $_POST["grade"];
    $originalFirstName = $_POST["originalFirstName"];

    editAuthor($originalFirstName, $firstName, $lastName, $grade);
    header("Location: authors.php?message=Author+name+has+been+changed");

} elseif ($_SERVER["REQUEST_METHOD"] === "GET"){
    $firstName = $_GET["firstName"];
    
    if  (isset($firstName)){
        $author = getAuthorByFirstName($firstName);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["deleteButton"]){
    $originalFirstName = $_POST["originalFirstName"];

    deleteAuthor($originalFirstName);
    header("Location: authors.php?message=Author+name+has+been+deleted");
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
    <title>Edit author</title>
</head>
<body>
    <nav class="navbar">
        <h3><a id="book-list-link" href="index.php">Books</a></h3>
        <h3><a id="book-form-link" href="add-book.php">Add book</a></h3>
        <h3><a id="author-list-link" href="authors.php">Authors</a></h3>
        <h3><a id="author-form-link" href="add-author.php">Add author</a></h3>
    </nav>
    <div class="form-div">

        <ul class ="list-unstyled">
        <?php foreach($errors as $error): ?>
            <li class="alert alert-danger"><?php echo $error ?></li>
        <?php endforeach; ?>
        </ul>

        <form id="form" action="edit-author.php" method="POST">
            <table>
            <div id="error-block"></div>
                <tr>
                    <td><label for="firstName"><h3>First name:</h3></label></td>
                    <td><input class="form-control" type="text" 
                                name="firstName" id="firstName" 
                                placeholder="Enter author first name"  size="60"
                                value="<?= $author["firstName"] ?>"></td>
                </tr>
                <tr>
                    <td><label for="lastName"><h3>Surname:</h3></label></td>
                    <td><input class="form-control" type="text" name="lastName" id="lastName" 
                                placeholder="Enter author surname"  size="60"
                                value="<?= $author["lastName"] ?>"></td>
                </tr>
                <tr>
                    <td><h3>Grade:</h3></td>
                    <td>
                        <input type="radio" name="grade" value="1" <?= ($author["grade"] == 1) ? "checked" : ""; ?>>
                        <label for="">1</label>
                        <input type="radio" name="grade" value="2" <?= ($author["grade"] == 2) ? "checked" : ""; ?>>
                        <label for="">2</label>
                        <input type="radio" name="grade" value="3" <?= ($author["grade"] == 3) ? "checked" : ""; ?>>
                        <label for="">3</label>
                        <input type="radio" name="grade" value="4" <?= ($author["grade"] == 4) ? "checked" : ""; ?>>
                        <label for="">4</label>
                        <input type="radio" name="grade" value="5" <?= ($author["grade"] == 5) ? "checked" : ""; ?>>
                        <label for="">5</label>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="originalFirstName" value="<?= $author["firstName"] ?>">
            <div class="btn-position-div">
                <input type="submit" name="deleteButton" id="submitButton" value="Delete" class="submit-button two-btn">
                <input type="submit" name="submitButton" id="submitButton" value="Save Changes" class="submit-button">
            </div>
        </form>

    </div>
   <footer>
       <h3>ICD007: Edit author</h3>
   </footer>
</body>
</html>
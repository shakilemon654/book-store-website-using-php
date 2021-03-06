<?php
    require_once("functions.php");
    $authors = array_reverse(getAuthors());

    // if (isset ($_GET['response'])){
    //     if ($_GET['response']=="1"){
    //         $msg = "New author is added.";
    //     }
    // }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Authors</title>
</head>
<body>
    <nav class="navbar">
        <h3><a id="book-list-link" href="index.php">Books</a></h3>
        <h3><a id="book-form-link" href="add-book.php">Add book</a></h3>
        <h3><a id="author-list-link" href="authors.php">Authors</a></h3>
        <h3><a id="author-form-link" href="add-author.php">Add author</a></h3>
    </nav>

    <div class="table-div">
        <div id="message-block">
            <ul class ="list-unstyled">
                <?php if(isset ($_GET['message'])): ?>
                    <li class="alert alert-success"><?= $_GET["message"]; ?></li>
                <?php endif; ?>
            </ul>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">First name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Grade</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($authors as $author): ?>
                <tr>
                    <td>
                        <a href="edit-author.php?firstName=<?= urlencode($author["firstName"]) ?>">
                        <?= $author["firstName"] ?>
                        </a>
                    </td>
                    <td><?= $author["lastName"] ?></td>
                    <td><?= $author["grade"] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <footer>
        <h3>ICD007: Authors list</h3>
    </footer>
</body>
</html>

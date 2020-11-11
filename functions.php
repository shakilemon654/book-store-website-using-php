<?php

const BOOKS_FILE = "books.txt";
const AUTHORS_FILE = "authors.txt";

function addAuthor($firstName, $lastName, $grade){
    $line = urlencode($firstName) .";". urlencode($lastName) .";". urlencode($grade) . PHP_EOL;
    file_put_contents(AUTHORS_FILE, $line, FILE_APPEND);
}

function addBook($title, $grade, $isRead){
    $line = urlencode($title) . ";" . urlencode($grade) . ";" . urlencode($isRead) . PHP_EOL;
    file_put_contents(BOOKS_FILE, $line, FILE_APPEND);
}

function getAuthors(){
    $lines = file(AUTHORS_FILE);
    $authors = [];

    foreach($lines as $line){
        list($firstName, $lastName, $grade) = explode(";", $line);
        $authors[] = ["firstName" => urldecode($firstName),
                        "lastName" => urldecode($lastName),
                        "grade" => urldecode($grade)];
    }

    return $authors;
}

function getBooks(){
    $lines = file(BOOKS_FILE);
    $books = [];

    foreach($lines as $line){
        list($title, $grade, $isRead) = explode(";", $line);
        $books[] = ["title" => urldecode($title),
                    "grade" => urldecode($grade),
                    "isRead" => urldecode($isRead)]; 
    }

    return $books;
}

function getAuthorByFirstName($firstName){
    $authors = getAuthors();

    foreach($authors as $author){
        if ($author["firstName"] === $firstName){
            return $author;
        }
    }

    return null;
}

function getBookByTitle($title){
    $books = getBooks();

    foreach ($books as $book) {
        if ($book["title"] === $title){
            return $book;
        }
    }

    return null;
}

function editAuthor($originalFirstName, $firstName, $lastName, $grade){
    $authors = getAuthors();
    $data = "";

    foreach($authors as $author){
        if ($author["firstName"] === $originalFirstName){
            $author["firstName"] = $firstName;
            $author["lastName"] = $lastName;
            $author["grade"] = $grade;
        }

        $data = $data . urlencode($author["firstName"]). ";"
                . urlencode($author["lastName"]) . ";"
                . urlencode($author["grade"]) . PHP_EOL;
    }

    file_put_contents(AUTHORS_FILE, $data);
}

function editBook($originalTitle, $title, $grade, $isRead){
    $books = getBooks();
    $data = "";

    foreach($books as $book){
        if ($book["title"] === $originalTitle){
            $book["title"] = $title;
            $book["grade"] = $grade;
            $book["isRead"] = $isRead;
        }

        $data = $data . urlencode($book["title"]). ";"
                . urlencode($book["grade"]) . ";"
                . urlencode($book["isRead"]) . PHP_EOL;
    }

    file_put_contents(BOOKS_FILE, $data);
}

function deleteAuthor($firstName){
    $authors = getAuthors();
    $data = "";

    foreach($authors as $author){
        if ($author["firstName"] !== $firstName){
            $data = $data . urlencode($author["firstName"]) . ";"
                    . urlencode($author["lastName"]) . ";"
                    . urlencode($author["grade"]) . PHP_EOL;
        }
    }

    file_put_contents(AUTHORS_FILE, $data);
}

function deleteBook($originalTitle){
    $books = getBooks();
    $data = "";

    foreach($books as $book){
        if ($book["title"] !== $originalTitle){
            $data = $data . urlencode($book["title"]) . ";"
                    . urlencode($book["grade"]) . ";"
                    . urlencode($book["isRead"]) . PHP_EOL;
        }
    }

    file_put_contents(BOOKS_FILE, $data);
}

?>
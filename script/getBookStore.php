<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Classes\Book;

try {
    $book = new Book();

    $books = $book->getBooks();

    if (!empty($books))
    {
        $response = ['status' => true, 'data' => $books];
        $response = json_encode($response);
    } else
    {
        $response = ['status'=> false,'error'=> 'no books found'];
        $response = json_encode($response);
    }
} catch (\Throwable $th) {
    $response = ['status'=> false,'error'=> 'no books found'];
    $response = json_encode($response);
}



// if (!empty($books)) {
//     // Iterate over the array of books
//     foreach ($books as $book) {
//         echo "ID: " . htmlspecialchars($book['id']) . "<br>";
//         echo "Name: " . htmlspecialchars($book['name']) . "<br>";
//         echo "Cover: " . htmlspecialchars($book['cover']) . "<br>";
//         echo "Author: " . htmlspecialchars($book['author']) . "<br>";
//         echo "Publisher: " . htmlspecialchars($book['publisher']) . "<br>";
//         echo "ISBN: " . htmlspecialchars($book['ISBN']) . "<br>";
//         echo "Description: " . htmlspecialchars($book['book_description']) . "<br>";
//         echo "Category: " . htmlspecialchars($book['category']) . "<br><br>";
//     }
// } else {
//     echo "No books found.";
// }

<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Classes\Book;

function getBookDetail($id, $name) {
    try {
        // Assuming you have a Book class and getBook method that takes id and name as parameters
        $book = new Book();
        $books = $book->getBook($id, $name);

        // Check if books array is not empty
        if (!empty($books)) {
            $response = ['status' => true, 'data' => $books];
        } else {
            $response = ['status' => false, 'error' => 'No books found'];
        }

        // Return JSON-encoded response
        return json_encode($response);
    } catch (\Throwable $th) {
        // Handle any exceptions and return an error response
        $response = ['status' => false, 'error' => 'An error occurred: ' . $th->getMessage()];
        return json_encode($response);
    }
}

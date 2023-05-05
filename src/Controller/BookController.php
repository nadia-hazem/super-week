<?php
// App/Controller/BookController.php

namespace App\Controller;
use App\Model\BookModel;

class BookController
{
    public function writeBookForm()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user'])) {
            throw new \Exception('Vous devez être connecté(e) pour accéder à cette page');
        }

        // Display the write book form
        require_once 'src/View/write.php';
    }

    public function addBook()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user'])) {
            throw new \Exception('Vous devez être connecté(e) pour accéder à cette page');
        }

        // Retrieve the form data
        $id_user = $_SESSION['user']['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        // apply the valid_data function to the form data
        $title = Utils::valid_data($title);
        $content = Utils::valid_data($content);

        // Validate the input
        if (empty($title) || empty($content)) {
            throw new \Exception('Tous les champs sont obligatoires');
        }

        $bookModel = new BookModel();

        // Check for an existing book
        $existing_book = $bookModel->findOneBy('title', $title);
        if ($existing_book !== false) {
            // Store the error message in session
            $_SESSION['error_message'] = "Un livre avec le titre '$title' existe déjà dans la base de données.";
            // Redirect the user back to the write book form
            header('Location: /books/write');
            exit();
        }

        // Create a new book in the database
        $bookModel->create($title, $content, $id_user);

        // Redirect to the list of books
        header('Location: /');
        exit();
    }

    public function listBooks()
    {
        // Retrieve all books from the database
        $bookModel = new BookModel();
        $books = $bookModel->findAll();
        if($books === false) {
            throw new \Exception('Impossible de récupérer les livres');
        } else {
            // Store the books in session
            $_SESSION['books'] = $books;
            // Return books data as JSON
            echo json_encode($books); 
            /* require_once 'src/View/books.php'; */
        }
    }

    public function displayBookData($id)
    {
        // Retrieve the book from the database
        $bookModel = new BookModel();
        $book = $bookModel->findOneBy('id', $id);

        if (!$book) {
            throw new \Exception('Impossible de récupérer le livre');
        } else {
            // Store the book in session
            $_SESSION['book'] = $book;
        }
        // Return user data as JSON
        echo json_encode($book);    
    }
}

<?php
// BookController.php

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
        require_once 'src/View/books/write.php';
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
        $existing_book = $bookModel->findOneByTitle($title);
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
        header('Location: /books');
        exit();
    }

    public function listBooks()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user'])) {
            throw new \Exception('Vous devez être connecté pour accéder à cette page');
        }

        // Retrieve all books from the database
        $bookModel = new BookModel();
        $books = $bookModel->findAll();
        $Utils = new Utils();

        // Display the list of books
        require_once 'src/View/books/books.php';
    }
}

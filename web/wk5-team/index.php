<?php

session_start();

//connect to database


$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }

switch ($action){
    case 'results': 
        $_SESSION['book'] = filter_input(INPUT_GET, 'book', FILTER_SANITIZE_STRING);
        $_SESSION['chapter'] = filter_input(INPUT_GET, 'chapter', FILTER_VALIDATE_INT);
        $_SESSION['verse'] = filter_input(INPUT_GET, 'verse', FILTER_VALIDATE_INT);
        $_SESSION['content'] = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);

        include 'results.php';
        break;
    case 'addToDatabase':
        include 'addresults.php';
        break;
    case 'insertForm':
        include 'insert.php';
        break;
    case 'addToDatabase':
        include 'addresults.php';
        break;
    default:
        include 'homepage.php';
        break;
    }

?>
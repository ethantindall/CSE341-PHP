<?php

session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }

$_SESSION['message'] = '';

 switch ($action){
    case 'add': 
        include 'add.php';
        break;
    case 'addToDatabase':

        $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING);
        $stickerId = filter_input(INPUT_POST, 'stickerId', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
        $purchaseDate = filter_input(INPUT_POST, 'purchaseDate', FILTER_SANITIZE_STRING);
        $checkedOut = filter_input(INPUT_POST, 'checkedOut', FILTER_SANITIZE_STRING);
        $checkedOutDate = filter_input(INPUT_POST, 'checkedOutDate', FILTER_SANITIZE_STRING);
        $checkedOutBy = filter_input(INPUT_POST, 'checkedOutBy', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

        echo $name;
        $_SESSION['message'] = 'name: ' .$name;

        
        include 'home.php';
        break;
    case 'search':

        include 'home.php';
        break;
    default:
        include 'home.php';
        break;
    }
    



?>
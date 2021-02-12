<?php

session_start();
require_once 'connect.php';


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

        $company = filter_input(INPUT_POST, 'add-company', FILTER_SANITIZE_STRING);
        $stickerId = filter_input(INPUT_POST, 'add-sticker', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'add-name', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'add-quantity', FILTER_SANITIZE_NUMBER_INT);
        $purchaseDate = filter_input(INPUT_POST, 'add-purchase-date', FILTER_SANITIZE_STRING);
        $checkedOut = filter_input(INPUT_POST, 'add-checked-out', FILTER_SANITIZE_STRING);
        $checkedOutDate = filter_input(INPUT_POST, 'add-checked-outDate', FILTER_SANITIZE_STRING);
        $checkedOutBy = filter_input(INPUT_POST, 'add-checkout-by', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'add-description', FILTER_SANITIZE_STRING);

        //addToDatabase($company, $stickerId, $name, $quantity, $purchaseDate, $checkedOut, $checkedOutDate, $checkedOutBy, $description);

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
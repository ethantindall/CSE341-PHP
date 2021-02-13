<?php

session_start();
require 'updatefunctions.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }

$_SESSION['results'] = '';

 switch ($action){
    case 'add': 
        include 'add.php';
        break;
    case 'addToDatabase':
        $company = filter_input(INPUT_POST, 'add-company', FILTER_SANITIZE_STRING);
        $stickerId = filter_input(INPUT_POST, 'add-sticker', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'add-name', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'add-quantity', FILTER_SANITIZE_NUMBER_INT);
        $checkedOut = filter_input(INPUT_POST, 'add-checked-out');
        $checkedOutBy = filter_input(INPUT_POST, 'add-checkout-by');
        $description = filter_input(INPUT_POST, 'add-description', FILTER_SANITIZE_STRING);


        addToDatabase($company, $stickerId, $name, $quantity, $checkedOut, $checkedOutBy, $description);

        $_SESSION['results'] = 'Data Added: Select a table';

        include 'home.php';
        break;
    case 'search':
        $name = filter_input(INPUT_POST, 'searchParameters', FILTER_SANITIZE_STRING);
        $company = filter_input(INPUT_POST, 'sCompany', FILTER_SANITIZE_STRING);
        $company = $company . 'Inventory';

        $_SESSION['results'] = searchresults($company, $name);


        include 'home.php';
        break;
    case 'pullStrataItem':
        $item = $_GET['item'];

        //getStrataUpdateInfo($item);

        include 'updateitem.php';
        break;
    case 'pullSpectraItem':
        $item = $_GET['item'];
        //getSpectraUpdateInfo($item);

        include 'updateitem.php';
        break;
    case 'deleteStrata':
        $_SESSION['message'] = 'hello world';
        $db = connectToDB();

        $sql= 'DELETE FROM strataInventory where item_id = :item';
        $stmt->bindValue(':item', $_GET['item']);
        $stmt = $db->prepare($sql);
        $stmt->execute();

        include 'home.php';
        break;
    default:
        include 'home.php';
        break;
    }
    



?>
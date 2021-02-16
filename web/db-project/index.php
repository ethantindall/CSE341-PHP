<?php

session_start();
require 'connect.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }

$_SESSION['results'] = '';

 switch ($action){
    case 'add': 
        include 'add.php';
        break;
    case 'update':
        $company = filter_input(INPUT_POST, 'add-company', FILTER_SANITIZE_STRING);
        $db = connectToDB(); 
        $id = filter_input(INPUT_POST, 'item-id', FILTER_SANITIZE_NUMBER_INT);
        $stickerId = filter_input(INPUT_POST, 'add-sticker', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'add-name', FILTER_SANITIZE_STRING);
        $quantity = filter_input(INPUT_POST, 'add-quantity', FILTER_SANITIZE_NUMBER_INT);
        $checkedOut = filter_input(INPUT_POST, 'add-checked-out');
        $checkedOutBy = filter_input(INPUT_POST, 'add-checkout-by');
        $description = filter_input(INPUT_POST, 'add-description', FILTER_SANITIZE_STRING);

        if($company == 'strataInventory') {
            $sql = 'UPDATE '. $company . ' SET
                item_sticker_id = :sticker,
                item_name = :name,
                item_quantity = :quantity,
                item_checked_out = :checkedOut,
                item_checked_out_by = :checkedOutBy,
                item_description = :description
                WHERE item_id = :id';
                $stmt = $db->prepare($sql);

                $stmt->bindValue(':sticker', $stickerId);
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':description', $description);
                $stmt->bindValue(':quantity', $quantity);
                $stmt->bindValue(':checkedOut', $checkedOut);
                $stmt->bindValue(':checkedOutBy', $checkedOutBy);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $_SESSION['results'] = searchresults('strataInventory', '');
        }
        else if($company == 'spectraInventory') {
            $sql = 'UPDATE '. $company . ' SET
                item_name = :name,
                item_quantity = :quantity,
                item_checked_out = :checkedOut,
                item_checked_out_by = :checkedOutBy,
                item_description = :description
                WHERE item_id = :id';

                $stmt = $db->prepare($sql);
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':description', $description);
                $stmt->bindValue(':quantity', $quantity);
                $stmt->bindValue(':checkedOut', $checkedOut);
                $stmt->bindValue(':checkedOutBy', $checkedOutBy);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $_SESSION['results'] = searchresults('spectraInventory', '');

        }

        
        include 'home.php';
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

        $_SESSION['results'] = searchresults($company, '');

        include 'home.php';
        break;
    case 'search':
        $name = filter_input(INPUT_POST, 'searchParameters', FILTER_SANITIZE_STRING);
        $company = filter_input(INPUT_POST, 'sCompany', FILTER_SANITIZE_STRING);
        $company = $company . 'Inventory';

        $_SESSION['results'] = searchresults($company, $name);


        include 'home.php';
        break;
    case 'requestUpdate':
        $item = $_GET['item'];
        $company = $_GET['company'];
        $row = getUpdateInfo($item, $company);

        if($company == 'strata') {
            $id = $row['item_id'];
            $stickerId = $row['item_sticker_id'];
            $name = $row['item_name'];
            $quantity = $row['item_quantity'];
            $checkedOut = $row['item_checked_out'];
            $checkedOutBy = $row['item_checked_out_by'];
            $description = $row['item_description'];
        }
        else if($company == 'spectra') {
            //echo $company;
            $id = $row['item_id'];
            $name = $row['item_name'];
            $quantity = $row['item_quantity'];
            $checkedOut = $row['item_checked_out'];
            echo $checkedOut;
            $checkedOutBy = $row['item_checked_out_by'];
            $description = $row['item_description'];
        }
        include 'updateitem.php';
        break;
    case 'deleteStrata':
        $item = $_GET['item'];

        deleteStrata($item);
        include 'home.php';
        break;
    case 'deleteSpectra':
        $item = $_GET['item'];

        deleteSpectra($item);
        include 'home.php';
        break;
    default:
        include 'home.php';
        break;
    }
    



?>
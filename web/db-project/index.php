<?php

session_start();
//require 'connect.php';


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

        $query = 'INSERT INTO :company (item_sticker_id, item_name, item_description, item_quantity
                                        item_purchase_date, item_checked_out, item_checked_out_date, item_checked_out_by) 
                    VALUES (:sticker, :name, :desc, :quantity, :purchase, :check, :checkdate, :checkby)';

         //   $db = connect_to_db(); 

        /*    $stmt = $db->prepare($query);

            $stmt->bindValue(':company', $company, PDO::PARAM_INT);
            $stmt->bindValue(':sticker', $stickerId, PDO::PARAM_INT);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindValue(':purchase', $classificationId, PDO::PARAM_INT);
            $stmt->bindValue(':check', $classificationId, PDO::PARAM_INT);
            $stmt->bindValue(':checkdate', $classificationId, PDO::PARAM_INT);
            $stmt->bindValue(':checkby', $classificationId, PDO::PARAM_INT);
            $stmt->bindValue(':desc', $description, PDO::PARAM_INT);
*/
        //    $stmt->execute();

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
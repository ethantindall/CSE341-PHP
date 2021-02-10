<?php

session_start();

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL){
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 }



 switch ($action){
    case 'add': 
        include 'add.php';
        break;
    case 'addToDatabase':

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
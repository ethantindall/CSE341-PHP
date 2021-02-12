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
        $name = $_POST['name'];


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
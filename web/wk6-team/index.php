<?php

session_start();

require 'connect.php';

$db = connect_to_db();


//create variable to echo
$_SESSION['rows'] = '';
$statement = $db->query('SELECT username, password FROM note_user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  $_SESSION['rows'] .= 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}



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
    case 'addtoDatabase':
        $_SESSION['book'] = filter_input(INPUT_GET, 'book', FILTER_SANITIZE_STRING);
        $_SESSION['chapter'] = filter_input(INPUT_GET, 'chapter', FILTER_VALIDATE_INT);
        $_SESSION['verse'] = filter_input(INPUT_GET, 'verse', FILTER_VALIDATE_INT);
        $_SESSION['content'] = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);

        echo $_SESSION['book'];
        include 'addresults.php';
        break;
    default:
        include 'form.php';
        break;
    }


?>
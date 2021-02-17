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

        include 'views/results.php';
        break;
    case 'insertForm':
        include 'views/insert.php';
        break;
    case 'addToDatabase':
        $_SESSION['book'] = filter_input(INPUT_GET, 'book', FILTER_SANITIZE_STRING);
        $_SESSION['chapter'] = filter_input(INPUT_GET, 'chapter', FILTER_VALIDATE_INT);
        $_SESSION['verse'] = filter_input(INPUT_GET, 'verse', FILTER_VALIDATE_INT);
        $_SESSION['content'] = filter_input(INPUT_GET, 'content', FILTER_SANITIZE_STRING);

        echo $_SESSION['book'];
        
        include 'views/addresults.php';
        break;
    case 'search':
        include 'views/search.php';
        break;
    default:
        $output = '';
        try {
            $db = connect_to_db();
            foreach ($db->query("SELECT id, book, chapter, verse, content FROM scriptures WHERE book LIKE ") as $row) {
                $output .= '<a href="content.php/?id='. $row['id'] .'">Scripture:</a> ' . $row['book'] .' ' . $row['chapter'] . ':' . $row['verse'] . '<br/>';
            }
        } catch (PDOException $e) {
            echo 'Error!: Promote the Gold Database';
            die();
        }
        include 'views/homepage.php';
        break;
    }

?>
<?php

session_start();
include 'connect.php';
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
        $book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
        $chapter = filter_input(INPUT_POST, 'chapter', FILTER_VALIDATE_INT);
        $verse = filter_input(INPUT_POST, 'verse', FILTER_VALIDATE_INT);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);

            $db = connect_to_db(); 
        
            $sql = 'INSERT INTO scriptures (book, chapter, verse, content) 
                    VALUES (:book, :chapter, :verse, :content)';
        
        
            $stmt = $db->prepare($sql);
        
            //$stmt->bindValue(':com', $company);
            $stmt->bindValue(':book', $book);
            $stmt->bindValue(':chapter', $chapter);
            $stmt->bindValue(':verse', $verse);
            $stmt->bindValue(':content', $content);      
            
            $stmt->execute();
        
            $output = '';
            try {
                $db = connect_to_db();
                foreach ($db->query('SELECT * FROM scriptures') as $row) {
                    $output .= '<a href="content.php/?id=' . $row['id'] . '">Scripture:</a> ' . $row['book'] .' ' . $row['chapter'] . ':' . $row['verse'] . '<br/>';
                }
            } catch (PDOException $e) {
                echo 'Error!: Promote the Gold Database';
                die();
            }
        include 'views/homepage.php';
        break;
    case 'search':
        include 'views/search.php';
        break;
    case 'completeSearch':
        include 'views/search.php';
        break;
    default:
        $output = 'SELECT A TABLE';
        try {
            $db = connect_to_db();
            foreach ($db->query('SELECT * FROM scriptures') as $row) {
                $output .= '<a href="content.php/?id=' . $row['id'] . '">Scripture:</a> ' . $row['book'] .' ' . $row['chapter'] . ':' . $row['verse'] . '<br/>';
            }
        } catch (PDOException $e) {
            echo 'Error!: Promote the Gold Database';
            die();
        }
        include 'views/homepage.php';
        break;
    }

?>
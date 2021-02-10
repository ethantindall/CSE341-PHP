<?php
session_start();

require 'connect.php';


?><!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Wk 5 Team</title>

</head>
<body>


    <?php echo $_POST['book']; ?>


    <?php 

    $query = "INSERT INTO scriptures(book, chapter, verse, content) VALUES ('{$_POST['book']}', 
                                                                            '{$_POST['chapter']}',
                                                                            '{$_POST['verse']}',
                                                                            '{$_POST['content']}')";
                                                               
    try {
    $db = connect_to_db();
    $db->query($query);
    }
    catch (PDOException $e) {
        echo 'Error!: Promote the Gold Database';
        die();
}
?>

</body>
</html>
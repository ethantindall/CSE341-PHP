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
<h1>SCRIPTURE RESOURCES</h1>

<?php 
    echo 'hi';
    $db = connect_to_db();
    echo 'hello';
    foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures WHERE book ILIKE %{$_POST["book_name"]}%') as $row) {
        echo 'Scripture: ' . $row['book'] .' ' . $row['chapter'] . ':' . $row['verse'] . '<br/>';
    }

?>

</body>
</html>
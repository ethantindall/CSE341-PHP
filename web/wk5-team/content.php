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
<h1>SCRIPTURE RESOURCES CONTENT</h1>

<?php 

    $scripture = $_GET['id'];
    $ints = (int) $scripture;
    echo $ints + 2; 

    foreach ($db->query("SELECT id, book, chapter, verse, content FROM scriptures WHERE id = 2") as $row) {
        echo 'Scripture:' . $row['book'] .' ' . $row['chapter'] . ':' . $row['verse'] . '<br/>';
    }


?>

</body>
</html>
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
<header>
<h1>SCRIPTURE RESOURCES</h1>
    <a href="/wk5-team/index.php"><button>Home</button></a>
    <a href="/wk5-team/index.php/?action=insertForm"><button>Input</button></a>
    <a href="/wk5-team/index.php/?action=search"><button>Search</button></a></br>
</header>

<?php 

    try {
    $db = connect_to_db();
    foreach ($db->query("SELECT id, book, chapter, verse, content FROM scriptures WHERE book LIKE ") as $row) {
        echo '<a href="content.php/?id='. $row['id'] .'">Scripture:</a> ' . $row['book'] .' ' . $row['chapter'] . ':' . $row['verse'] . '<br/>';
    }
} catch (PDOException $e) {
    echo 'Error!: Promote the Gold Database';
    die();
}
?>

</body>
</html>
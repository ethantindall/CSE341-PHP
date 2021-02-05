<<<<<<< HEAD
<?php 
session_start();

require 'connect.php';

?><!DOCTYPE html>
=======
<!DOCTYPE html>
>>>>>>> 6eb1972f5f44c8c5381908a029aa962ce9d127b5
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
=======

>>>>>>> 6eb1972f5f44c8c5381908a029aa962ce9d127b5
    <title>Wk 5 Team</title>

</head>
<body>
<<<<<<< HEAD
<h1>SCRIPTURE RESOURCES</h1>

<?php 
    try {
    echo 'hi';
    $db = connect_to_db();
    echo $_POST['book_name'];
    foreach ($db->query("SELECT id, book, chapter, verse, content FROM scriptures WHERE book LIKE '%{$_POST["book_name"]}%'") as $row) {
        echo '<a href="content.php/?id='. $row['id'] .'">Scripture: </a>' . $row['book'] .' ' . $row['chapter'] . ':' . $row['verse'] . '<br/>';
    }
} catch (PDOException $e) {
    echo 'Error!: Promote the Gold Database';
    die();
}
?>

=======
    <ul>
        <li>Book: <?php echo $_SESSION['book'] ?></li>
        <li>Chapter: <?php echo $_SESSION['chapter'] ?></li>
        <li>Verse: <?php echo $_SESSION['verse'] ?></li>
        <li>Content: <?php echo $_SESSION['content'] ?></li>
    </ul>
>>>>>>> 6eb1972f5f44c8c5381908a029aa962ce9d127b5
</body>
</html>
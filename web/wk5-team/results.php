<?php 
function connect_to_db() {
    try {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;

    } catch (PDOException $ex) {
        
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
}

$db = connect_to_db();

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
    $statement = $db->prepare('SELECT book, chapter, verse, content FROM scriptures');
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
    echo 'Scripture: ' . $row['book'] . ':' . $row['chapter'] . $row['verse'] . '<br/>';
    }

?>

</body>
</html>
<?php 

require 'connect.php';
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

$statement = $db->query('SELECT username, password FROM note_user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
 echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}
?>

</body>
</html>
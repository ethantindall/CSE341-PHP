<?php

session_start();


//connect to database
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}



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
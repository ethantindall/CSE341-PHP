<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSE341 Wk 3 Team</title>
    <style>textarea {margin: 10px;} div {
        padding: 10px;} form {display:flex; width: 500px; margin: 0 auto; flex-direction: column;}</style>
</head>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
Major: <?php echo $_POST['major']; ?><br>
Message: <?php echo $_POST['comments']; ?><br>

<?php 

$locationValues = array(
    '0'  => "North America",
    '1' => 'South America',
    '2' => 'Europe',
    '3' => 'Asia',
    '4' => 'Australia',
    '5' => 'Africa',
    '6' => 'Antarctica');



if (is_array($_POST['continent'])){
       foreach($_POST['continent'] as $value)
        {
            echo 'Been To: '. $locationValues[$value] . '<br>';
        }
    }
else {echo "hi";}

?>
</body>
</html>
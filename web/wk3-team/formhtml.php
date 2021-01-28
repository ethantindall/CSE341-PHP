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
    <form method="post" name='template' action="form.php">
        <label for="name">Name</label>
        <input type="text" name="name">

        <label for="email">Email</label>
        <input type="email" name="email">
<div>

<?php 
$majorArray = ['Computer Information Technology', 'Computer Engineering', 'Web Design and Development'];


$display = "";
    foreach($majorArray as $item) {
        $display .= '<input type="radio" name="major" value="' . $item . '"><label>'. $item .'</label><br>';
    }
    echo $display;
?>
</div>
        <label>Comments</label>
        <textarea name="comments"></textarea>


<input type="checkbox" name='continent[]' value="0">North America</input>
<input type="checkbox" name='continent[]' value="1">South America</input>
<input type="checkbox" name='continent[]' value="2">Europe</input>
<input type="checkbox" name='continent[]' value="3">Asia</input>
<input type="checkbox" name='continent[]' value="4">Australia</input>
<input type="checkbox" name='continent[]' value="5">Africa</input>
<input type="checkbox" name='continent[]' value="6">Antarctica</input>


        <input type="submit" value="Submit Form">
    </form>


</body>
</html>
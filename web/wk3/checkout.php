<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "main.css" ?></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>CSE341 Wk 3 Checkout</title>

</head>
<body>
<header><h1>Checkout Page</h1></header>

<form method="POST" action="/CSE341-PHP/web/wk3/index.php">

    <label>Street Address</label>
    <input name="address" id="address" type="text"><br>
    
    <label>City</label>
    <input type="text" name="city" id="city"><br>
    
    <label>State</label>
    <input type="text" name="state" id="state"><br>
    
    <label>Zipcode</label>
    <input type="text" name="zipcode" id="zipcode"><br>

    <input type="submit" value="Checkout">
    <input type="hidden" name="action" value="processTransaction">

</form>

</body>
</html>
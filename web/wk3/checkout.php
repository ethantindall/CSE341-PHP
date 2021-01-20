<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "main.css" ?></style>
    <style><?php include "form.css" ?></style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>CSE341 Wk 3 Checkout</title>

</head>
<body>
<header>   
        
        <span>PET</span><b>TOYS</b>

    <h1>Checkout Page</h1></header>

<form method="POST" action="/wk3/index.php">

    <label>Street Address</label>
    <input required name="address" id="address" type="text"><br>
    
    <label>City</label>
    <input required type="text" name="city" id="city"><br>
    
    <label>State</label>
    <input required type="text" name="state" id="state"><br>
    
    <label>Zipcode</label>
    <input required type="text" name="zipcode" id="zipcode"><br>

    <input id="sendButton" type="submit" value="Checkout">
    <input required type="hidden" name="action" value="processTransaction">

</form>

</body>
</html>
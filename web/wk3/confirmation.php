<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "main.css" ?></style>
    <style>main{color: black; display: block; padding: 20px;} div {padding: 10px;}</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>CSE341 Wk 3 Confirmation</title>

</head>
<body>
<header>    
        
        <span>PET</span><b>TOYS</b>

    <h1>Confirmation Page</h1></header>
<main>
    <h2>Your order has been placed!</h2>
    <div>
        <?php echo '<h3>Address:</h3>' . $_SESSION['display'] . '<br>'; ?>
    </div>
    <div>
        <?php echo $_SESSION['finalCart']; ?>
    </div>
</main>
</body>
</html>
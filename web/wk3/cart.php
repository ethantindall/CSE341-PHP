<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "main.css" ?></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>CSE341 Wk 3 Cart</title>

</head>
<body>
    <header><h1>Your Cart</h1>    
    <a href="/CSE341-PHP/web/wk3/"><button class="viewStore">View Store</button></a>
</header>

    <main class="shoppingCart">
        <?php if (isset($_SESSION['cartItem'])) { 
            echo $_SESSION['cartItem'];
         } ?>
    
    </main>

    <?php if (isset($_SESSION['cartItem']) && $_SESSION['cartItem'] != 'You have no items in your cart.') { echo '<footer><a href="/CSE341-PHP/web/wk3/?action=checkoutPage"><button>Proceed To Checkout</button></a></footer>';} ?>
</body>
</html>
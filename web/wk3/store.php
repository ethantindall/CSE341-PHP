<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "main.css" ?></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title>CSE341 Wk 3 Store</title>

</head>
<body>
    <header>
        
        <span>PET</span><b>TOYS</b>

    </header>

    <div id="bar">
    <a href="index.php/?action=cart"><button class="viewCart">View Cart</button></a>

    Welcome to petToys.com. Browse our toy collection today! 
    </div>

    <main>

        <div class="card card0">
            <img src="https://loremflickr.com/200/100/cat" alt="Cat toy">
            <h2>Cat Toy</h2>
                <form>
                    <input id="add0" type="submit" value="<?php echo $_SESSION['catToy']; ?>">
                    <input type="hidden" name="action" value="addcatToy">
                </form>
        </div>

        <div class="card card1">
            <img src="https://loremflickr.com/200/100/dog" alt="Dog toy">
            <h2>Dog Toy</h2>
                <form>
                    <input id="add1" type="submit" value="<?php echo $_SESSION['dogToy']; ?>">
                    <input type="hidden" name="action" value="adddogToy">
                </form>
        </div>

        <div class="card card2">
            <img src="https://loremflickr.com/200/100/dolphin" alt="Dolphin toy">
            <h2>Dolphin Toy</h2>
                <form>
                    <input id="add2" type="submit" value="<?php echo $_SESSION['dolphinToy']; ?>">
                    <input type="hidden" name="action" value="adddolphinToy">
                </form>
        </div>

        <div class="card card3">
            <img src="https://loremflickr.com/200/100/frog" alt="Frog toy">
            <h2>Frog Toy</h2>
                <form>
                    <input id="add3" type="submit" value="<?php echo $_SESSION['frogToy']; ?>">
                    <input type="hidden" name="action" value="addfrogToy">
                </form>
        </div>

        <div class="card card4">
            <img src="https://loremflickr.com/200/100/fish" alt="Fish toy">
            <h2>Fish Toy</h2>
                <form>
                    <input id="add4" type="submit" value="<?php echo $_SESSION['fishToy']; ?>">
                    <input type="hidden" name="action" value="addfishToy">
                </form>
        </div>

        <div class="card card5">
            <img src="https://loremflickr.com/200/100/eagle" alt="Eagle Toy">
            <h2>Eagle Toy</h2>
                <form>
                    <input id="add5" type="submit" value="<?php echo $_SESSION['eagleToy']; ?>">
                    <input type="hidden" name="action" value="addeagleToy">
                </form>
        </div>



    </main>

    <footer></footer>
    <script src="wk3.js"></script>
</body>
</html>
<?php 
session_start();


?><!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "main.css" ?></style>
    <style>
        main {
            width: 500px;
            margin: 40px auto;
        }
    </style>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <script>
        function when(x) {
            if (x == 0) {document.getElementById('add-sticker').disabled= false;}
            if (x == 1) {document.getElementById('add-sticker').disabled= true;
                         document.getElementById('add-sticker').value = "";}
        }
        function checkDisable(x){
            if (x == 0) {document.getElementById("add-checkout-by").disabled = false;}
            if (x == 1) {document.getElementById("add-checkout-by").disabled = true;
                         document.getElementById("add-checkout-by").value = 'NULL';}
        }
    </script>

    <title>Strata SHIP Update Page</title>

</head>
<body>
    <header>   
        <div class="bar topbar"></div>

        <div class="slantedbar"><h1>Spectra Helpdesk Inventory Program</h1></div>
        <div class="bar bottombar"></div>

    </header>
        <main>
        <?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; } ?> 
        <div id="addInfo">
            <form method="post" action="/db-project/index.php">
            <h3>Delete This Entry?</h3>


                <input id="search" type="submit" value="Delete From DB">
                <input type="hidden" name="action" value="delete">

            </form>
            <a href="/db-project/index.php"><button>Return to Home</button></a>

        </div>

        </main>
</body></html>
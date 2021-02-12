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
    <title>Strata SHIP</title>

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
            <h3>Add Info to Database</h3>

            <label>Select company: </label>
                <div>
                    <input type="radio" required name="add-company" value="strataInventory" onclick="whenwhen('strata')">Strata</input>
                    <input type="radio" required name="add-company" value="spectraInventory" onclick="whenwhen('spectra')">Spectra</input>
                </div>
                <div id="addform">
                    Sticker ID: <input type="number" id="add-sticker" name="add-sticker"><br>
                    Name: <input required type="text" name="add-name"><br>
                    Quantity: <input required type="number" min="0" max="100" name="add-quantity"><br>
                    Checked Out:  <input required type="radio" name="add-checked-out" value="TRUE">True</input>
                                  <input required type="radio" name="add-checked-out" value="FALSE">False</input><br>
                        Checked Out By:  <select id="add-checkout-by" name="add-checkout-by">
                                            <option value="1">Ethan</option>
                                            <option value="2">James</option>
                                            <option value="3">Steve</option>
                                        </select><br>
                        Description: <textarea required name="add-description"></textarea>

                </div>


                <input id="search" type="submit" value="Add to DB">
                <input type="hidden" name="action" value="addToDatabase">

            </form>
            <a href="/db-project/index.php"><button>Return to Home</button></a>

        </div>
        <script src="script.js"></script>

        </main>
</body></html>
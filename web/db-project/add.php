<?php 
session_start();

require 'connect.php';

?><!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "main.css" ?></style>
    <style>
        main {
            width: 700px;
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
<div id="addInfo">
            <form method="POST" action="index.php">
            <h3>Add Info to Database</h3>
            <?php 
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
         ?> 
            <label>Select company: </label>
                <div>
                    <input type="radio" required name="company" value="strata" onclick="whenwhen('strata')">Strata</input>
                    <input type="radio" required name="company" value="spectra" onclick="whenwhen('spectra')">Spectra</input>
                </div>
                <div id="addform">
                    Sticker ID: <input type="number" id="add-sticker" name="add-sticker"><br>
                    Name: <input required type="text" name="add-name"><br>
                    Quantity: <input required type="number" min="0" max="100" name="add-quantity"><br>
                    Purchase Date: <input required type="date" name="add-purchase-date"><br>
                    Checked Out:  <input required type="radio" name="add-checked-out" value="1">True</input>
                                  <input required type="radio" name="add-checked-out" value="0">False</input><br>
                        Checked Out Date: <input type="date" name="add-checkout-date"><br>
                        Checked Out By: <input type="text" name="add-checkout-by"><br>
                    Description: <textarea required name="add-description"></textarea>

                </div>


                <input id="search" type="submit" value="Add to DB">
                <input type="hidden" name="action" value="addToDatabase">

            </form>
            <a href="/db-project/index.php"><button>Return to Home</button></a>

        </div>
        </main>
        <script src="script.js"></script>
</body></html>
<?php 
session_start();

require 'connect.php';

?><!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php include "main.css" ?></style>
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

        <form method="POST" action="index.php">
            <div>
                <label>Select company: </label>
                <input type="radio" name="company" value="strata"  <?php if (isset($_POST['company']) && $_POST['company'] == 'strata') {echo 'checked="checked" ';} ?>>Strata</input>
                <input type="radio" name="company" value="spectra" <?php if (isset($_POST['company']) && $_POST['company'] == 'spectra') {echo 'checked="checked" ';} ?>>Spectra</input>
            </div>
            
            <label>Search By Name:</label>
            <!--<div>
                <select name="searchBy" id="searchBy" onclick="dropedit()">
                <option value="item_name">Name</option>
                <option value="item_checked_out">Checked Out</option>
                <option value="item_sticker_id">Sticker ID</option>
                <option value="item_storage_location">Location</option>
            </select>
            </div>-->
            <input type="text" name="searchParameters" <?php if (isset($_POST['searchParameters'])) {echo 'value=' . $_POST['searchParameters'];} ?>
>
            <input id="search" type="submit" value="Search">
        </form>
        
        <button type="button"><a href="add.php">Add Info to Database</a></button>


        <div class="display-area">
            <table>

            <?php 
                $company = $_POST['company'] . 'Inventory';
                $searchby = $_POST['searchBy'];
                $textinput = $_POST['searchParameters'];
  
                searchresults($company, $searchby, $textinput);

            ?>          
            
            </table>
        </div>

    </main>
    <script src="script.js"></script>
</body>
</html>
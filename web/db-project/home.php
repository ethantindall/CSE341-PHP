<?php 
session_start();

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
        <?php if (isset($_SESSION['message'])) { echo $_SESSION['message']; } ?> 

        <form method="POST" action="index.php">
            <div>
                <label>Select company: </label>
                <input type="radio" name="sCompany" value="strata"  <?php if (isset($_POST['company']) && $_POST['company'] == 'strata') {echo 'checked="checked" ';} ?>>Strata</input>
                <input type="radio" name="sCompany" value="spectra" <?php if (isset($_POST['company']) && $_POST['company'] == 'spectra') {echo 'checked="checked" ';} ?>>Spectra</input>
            </div>
            
            <label>Search By Name: (Optional)</label>
            <input type="text" name="searchParameters">
            <input id="search" type="submit" value="Search">
            <input type="hidden" name="action" value="search">

        </form>
        
        <div id="add">
            <a href="index.php/?action=add"><button>Add Data to Database</button></a>
            <a href="../index.php"><button>Return to Class Home</button></a>

        </div>

        <div class="display-area">
            <table>

    
            <?php if (isset($_SESSION['results'])) { echo $_SESSION['results']; } ?> 

        
            
            </table>
        </div>

    </main>
    <script src="script.js"></script>
</body>
</html>
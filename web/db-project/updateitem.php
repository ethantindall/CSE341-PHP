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
        <div id="updateInfo">

        <form method="post" action="/db-project/index.php">
            <h3>Update Database Info</h3>

            <label>Select company: </label>
                <div>
                    <input type="radio" required name="add-company" value="strataInventory" <?php if(isset($company) && $company == 'strata'){ echo 'checked';} ?> onclick="when(0)">Strata</input>
                    <input type="radio" required name="add-company" value="spectraInventory" <?php if(isset($company) && $company == 'spectra'){ echo 'checked';} ?> onclick="when(1)">Spectra</input>
                </div>
                <div id="addform">
                    Sticker ID: <input type="number" id="add-sticker" name="add-sticker" value="<?php if(isset($stickerId)){ echo $stickerId;} ?>"><br>
                    Name: <input required type="text" name="add-name" value="<?php if(isset($name)){ echo $name;} ?>"><br>
                    Quantity: <input required type="number" min="0" max="100" name="add-quantity" value="<?php if(isset($quantity)){ echo $quantity;} ?>"><br>
                    Checked Out:  <input required type="radio" name="add-checked-out" onclick="checkDisable(0)" <?php if(isset($checkedOut) && $checkedOut == 'TRUE'){ echo 'checked';} ?> value="TRUE">True</input>
                                  <input required type="radio" name="add-checked-out" onclick="checkDisable(1)" <?php if(isset($checkedOut) && $checkedOut == 'FALSE'){ echo 'checked';} ?> value="FALSE">False</input><br>
                        Checked Out By:  <select id="add-checkout-by" name="add-checkout-by">
                                            <option value="NULL" <?php if(!isset($checkedOutBy)) {echo 'selected';} ?> disabled hidden>Select an Option</option> 
                                            <option value="1" <?php if(isset($checkedOutBy) && $checkedOutBy == 'Ethan') {echo 'selected';} ?>>Ethan</option>
                                            <option value="2" <?php if(isset($checkedOutBy) && $checkedOutBy == 'James') {echo 'selected';} ?>>James</option>
                                            <option value="3" <?php if(isset($checkedOutBy) && $checkedOutBy == 'Steve') {echo 'selected';} ?>>Steve</option>
                                        </select><br>
                        Description: <textarea required name="add-description"><?php if(isset($description)){ echo $description;} ?></textarea>

                </div>

                <input type="hidden" name="item-id" value="<?php echo $id; ?>">
                <input id="search" type="submit" value="Add to DB">
                <input type="hidden" name="action" value="update">

            </form>

            <form method="post" action="/db-project/index.php">
            <h3>Delete This Entry?</h3>


                <input id="search" type="submit" value="Delete From DB">
                <input type="hidden" name="action" value="delete">

            </form>
            <a href="/db-project/index.php"><button>Return to Home</button></a>

        </div>
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
        </main>
</body></html>
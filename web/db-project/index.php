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
                <input type="radio" name="company" value="strata">Strata</input>
                <input type="radio" name="company" value="spectra">Spectra</input>
            </div>
            <div>
            <label>Search By:</label>
            <select name="searchBy" id="searchBy">
                <option value="name">Name</option>
                <option value="checked-out">Checked Out</option>
                <option value="sticker-id">Sticker ID</option>
                <option value="location">Location</option>
            </select>
            </div>

            <input type="text" name="searchParameter">
            <input id="search" type="submit" value="Search">
        </form>
        
        <div class="display-area">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Sticker Number</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Checked Out</th>
                </tr>
            <?php 
                $company = $_POST['company'] . 'Inventory';
                $db = connect_to_db();
                $table = '';

                if ($company == 'strataInventory') {
                    echo ucfirst($_POST['company'] . ' Inventory');
                    foreach ($db->query('SELECT item_id, item_sticker_id, item_name, item_quantity, item_checked_out FROM ' . $company) as $row) {
                        $boolcheckedout = truefalse($row['item_checked_out']);
                        $table .=  '<tr><td>' . $row['item_id'] 
                            .= '</td><td>' . $row['item_sticker_id']
                            .= '</td><td>' . $row['item_name']  
                            .= '</td><td>' . $row['item_quantity']
                            .= '</td><td>' . $boolcheckedout
                            .= '</td></tr>';
                    }
                    echo $table;
                }
                else if ($company == 'spectraInventory') {
                    echo ucfirst($_POST['company'] . ' Inventory');
                    foreach ($db->query('SELECT item_id, item_name, item_quantity, item_owner, item_checked_out FROM ' . $company) as $row) {
                        $boolcheckedout = truefalse($row['item_checked_out']);
                        $table .=  '<tr><td>' . $row['item_id'] 
                            .= '</td><td>' . $row['item_name']  
                            .= '</td><td>' . $row['item_quantity']
                            .= '</td><td>' . $row['item_owner']
                            .= '</td><td>' . $boolcheckedout
                            .= '</td></tr>';
                    }
                    echo $table;
                }
                else {
                    echo 'Please Select a Table';
                }


            ?>          
            
            </table>
        </div>
    </main>
   
    <footer>

    </footer>
</body>
</html>
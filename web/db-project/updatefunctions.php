<?php

function connectToDB() {
    try {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;

    } catch (PDOException $e) {
        
        echo 'Error!: ' . $e->getMessage();
        die();
    }
}

function truefalse($varr) {
    if ($varr == 0) {
        return "FALSE";
    } else {
        return "TRUE";
    }
}


function searchresults($company, $textinput) {
    $db = connectToDB();
    $table = '';

    if ($company == 'strataInventory') {
        $dbquery = 'SELECT item_id, item_sticker_id, item_name, item_quantity, item_checked_out FROM ' 
            . $company . " WHERE item_name  LIKE '%" . $textinput . "%'";
            $table .= 'Strata Inventory';

        $table .= '<tr>
                    <th>ID</th>
                    <th>Sticker Number</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Checked Out</th>
                </tr>';
        foreach ($db->query($dbquery) as $row) {
            $boolcheckedout = truefalse($row['item_checked_out']);
            $table .=  '<tr><td>' . $row['item_id'] 
                . '</td><td>' . $row['item_sticker_id']
                . '</td><td>' . $row['item_name']  
                . '</td><td>' . $row['item_quantity']
                . '</td><td>' . $boolcheckedout
                . '</td></tr>';
        }
        return $table;
    }
    else if ($company == 'spectraInventory') {
        $dbquery = 'SELECT item_id, item_name, item_quantity, item_owner, item_checked_out FROM ' 
        . $company . " WHERE item_name  LIKE '%" . $textinput . "%'";
        $table .= 'Spectra Inventory';

        $table .= '<tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Owner</th>
                    <th>Checked Out</th>
                </tr>';

        foreach ($db->query($dbquery) as $row) {
            $boolcheckedout = truefalse($row['item_checked_out']);
            $table .=  '<tr><td>' . $row['item_id'] 
                . '</td><td>' . $row['item_name']  
                . '</td><td>' . $row['item_quantity']
                . '</td><td>' . $row['item_owner']
                . '</td><td>' . $boolcheckedout
                . '</td></tr>';
        }
        return $table;
    }
    else {
        return 'Please Select a Table';
    }
}



function addToDatabase($company, $stickerId, $name, $quantity, $checkedOut, $checkedOutBy, $description) {
        $query = "INSERT INTO " . $company . " (item_sticker_id, item_name, item_description, 
                                        item_quantity, item_storage_location,
                                        item_checked_out, item_checked_out_by) 
                VALUES (" . $stickerId . ", '" . $name . "', '" . $description . "', "
                         . $quantity . ", 1, " . $checkedOut . ", '" . $checkedOutBy ."')";

    echo $query;
    $db = connectToDB(); 

    $stmt = $db->prepare($query);

/*
    $stmt->bindValue(':company', $company, PDO::PARAM_STR);
    $stmt->bindValue(':sticker', $stickerId, PDO::PARAM_INT);
    $stmt->bindValue(':iname', $name, PDO::PARAM_STR);
    $stmt->bindValue(':idesc', $description, PDO::PARAM_STR);
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindValue(':icheck', $checkedOut, PDO::PARAM_BOOL);
    $stmt->bindValue(':checkby', $checkedOutBy, PDO::PARAM_INT);
    */
    
    $stmt->execute();

}
?>
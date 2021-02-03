<?php


//connect to database
function connect_to_db() {
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


function searchresults($company, $searchby, $textinput) {
    $db = connect_to_db();
    $table = '';

    if ($company == 'strataInventory') {
        $dbquery = 'SELECT item_id, item_sticker_id, item_name, item_quantity, item_checked_out FROM ' 
            . $company . ' WHERE item_name  LIKE "%' . $searchParameters . '%"';

        echo ucfirst($_POST['company'] . ' Inventory');
        foreach ($db->query($dbquery) as $row) {
            $boolcheckedout = truefalse($row['item_checked_out']);
            $table .=  '<tr><td>' . $row['item_id'] 
                . '</td><td>' . $row['item_sticker_id']
                . '</td><td>' . $row['item_name']  
                . '</td><td>' . $row['item_quantity']
                . '</td><td>' . $boolcheckedout
                . '</td></tr>';
        }
        echo $table;
    }
    else if ($company == 'spectraInventory') {
        $dbquery = 'SELECT item_id, item_name, item_quantity, item_owner, item_checked_out FROM ' 
        . $company . " WHERE item_name  LIKE '%" . $searchParameters . "%'";

        echo ucfirst($_POST['company'] . ' Inventory');
        foreach ($db->query($dbquery) as $row) {
            $boolcheckedout = truefalse($row['item_checked_out']);
            $table .=  '<tr><td>' . $row['item_id'] 
                . '</td><td>' . $row['item_name']  
                . '</td><td>' . $row['item_quantity']
                . '</td><td>' . $row['item_owner']
                . '</td><td>' . $boolcheckedout
                . '</td></tr>';
        }
        echo $table;
    }
    else {
        echo 'Please Select a Table';
    }
}



?>
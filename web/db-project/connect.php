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

function getStaff($id) {
    switch ($id) {
        case 1:
            return 'Ethan';
            break;
        case 2:
            return 'James';
            break;
        case 3:
            return 'Steve';
            break;
    }
}

function searchresults($company, $textinput) {
    $db = connectToDB();
    $table = $textinput;

    if ($company == 'strataInventory') {
        $dbquery = 'SELECT item_id, item_sticker_id, item_name, item_quantity, item_checked_out, item_checked_out_by FROM ' 
            . $company . " WHERE item_name  LIKE '%" . $textinput . "%'";
            $table .= 'Strata Inventory';

        $table .= '<tr>
                    <th>ID</th>
                    <th>Sticker Number</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Checked Out</th>
                    <th>Checked Out By</th>
                </tr>';
        foreach ($db->query($dbquery) as $row) {
            $boolcheckedout = truefalse($row['item_checked_out']);
            $staff = getStaff($row['item_checked_out_by']);
            $table .= '<tr><td>' . $row['item_id'] 
                . '</td><td>' . $row['item_sticker_id']
                . '</td><td>' . $row['item_name']  
                . '</td><td>' . $row['item_quantity']
                . '</td><td>' . $boolcheckedout
                . '</td><td>' . $staff
                . '</td><td><a href="index.php/?action=deleteStrata&item='. $row['item_id'] . '">Delete</a>'
                . '</td><td><a href="index.php/?action=requestUpdate&company=strata&item='. $row['item_id'] . '">Update</a>'
                . '</td></tr>';

        }
        return $table;
    }
    else if ($company == 'spectraInventory') {
        $dbquery = 'SELECT item_id, item_name, item_quantity, item_owner, item_checked_out, item_checked_out_by FROM ' 
        . $company . " WHERE item_name  LIKE '%" . $textinput . "%'";
        $table .= 'Spectra Inventory';

        $table .= '<tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Owner</th>
                    <th>Checked Out</th>
                    <th>Checked Out By</th>
                </tr>';

        foreach ($db->query($dbquery) as $row) {
            $boolcheckedout = truefalse($row['item_checked_out']);
            $staff = getStaff($row['item_checked_out_by']);
            $table .=  '<tr><td>' . $row['item_id'] 
                . '</td><td>' . $row['item_name']  
                . '</td><td>' . $row['item_quantity']
                . '</td><td>' . $row['item_owner']
                . '</td><td>' . $boolcheckedout
                . '</td><td>' . $staff
                . '</td><td><a href="index.php/?action=deleteSpectra&item='. $row['item_id'] . '">Delete</a>'
                . '</td><td><a href="index.php/?action=requestUpdate&company=spectra&item='. $row['item_id'] . '">Update</a>'
                . '</td></tr>';
        }
        return $table;
    }
    else {
        return 'Please Select a Table';
    }
}



function addToDatabase($company, $stickerId, $name, $quantity, $checkedOut, $checkedOutBy, $description) {
    try {

    if ($company == 'strataInventory') {
    $db = connectToDB(); 

    $sql = 'INSERT INTO strataInventory (item_sticker_id, item_name, item_description, item_quantity, item_storage_location, item_checked_out, item_checked_out_by) 
            VALUES (:sticker, :iname, :idesc, :quantity, 1, :icheck, :checkby)';


    $stmt = $db->prepare($sql);

    //$stmt->bindValue(':com', $company);
    $stmt->bindValue(':sticker', $stickerId);
    $stmt->bindValue(':iname', $name);
    $stmt->bindValue(':idesc', $description);
    $stmt->bindValue(':quantity', $quantity);
    $stmt->bindValue(':icheck', $checkedOut);
    $stmt->bindValue(':checkby', $checkedOutBy);

    
    $stmt->execute();
    }
    if ($company == 'spectraInventory') {
        $db = connectToDB(); 
    
        $sql = "INSERT INTO spectraInventory (item_name, item_description, item_quantity, item_storage_location, item_owner, item_checked_out, item_checked_out_by) 
                VALUES (:iname, :idesc, :quantity, 1, 'Company', :icheck, :checkby)";
    
    
        $stmt = $db->prepare($sql);
    
        $stmt->bindValue(':iname', $name);
        $stmt->bindValue(':idesc', $description);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':icheck', $checkedOut);
        $stmt->bindValue(':checkby', $checkedOutBy);

        
        $stmt->execute();
    }
    }
    catch (PDOException $e) {
            echo 'error: ' . $e ;
    }
}

function deleteStrata($item) {
    try {
    $db = connectToDB();

    $sql= 'DELETE FROM strataInventory where item_id = :item';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':item', $item);
    $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'error: ' . $e ;
}
}

function deleteSpectra($item) {
    try {
    $db = connectToDB();

    $sql= 'DELETE FROM spectraInventory WHERE item_id = :item';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':item', $item);
    $stmt->execute();
    }
    catch (PDOException $e) {
        echo 'error: ' . $e ;
    }
}

function getUpdateInfo($item, $company) {
    try {
        $db = connectToDB();
    
        $sql= 'SELECT * FROM ' . $company . 'Inventory WHERE item_id = ' . $item;
        foreach ($db->query($sql) as $row) {
            return $row;
        }

    }
    catch (PDOException $e) {
            echo 'error: ' . $e ;
    }
}
/*
$db = connectToDB();
$table = $textinput;

if ($company == 'strataInventory') {
    $dbquery = 'SELECT item_id, item_sticker_id, item_name, item_quantity, item_checked_out, item_checked_out_by FROM ' 
        . $company . " WHERE item_name  LIKE '%" . $textinput . "%'";
        $table .= 'Strata Inventory';

    $table .= '<tr>
                <th>ID</th>
                <th>Sticker Number</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Checked Out</th>
                <th>Checked Out By</th>
            </tr>';
    foreach ($db->query($sql) as $row) {
*/
?>
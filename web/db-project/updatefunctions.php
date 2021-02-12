<?php

function addToDatabase($company, $stickerId, $name, $quantity, $checkedOut, $checkedOutBy, $description) {
    if ($company == 'strata') {
        $query = "INSERT INTO :company (item_sticker_id, item_name, item_description, 
                                        item_quantity, item_storage_location,
                                        item_checked_out, item_checked_out_by) 
                VALUES ('1000', 'Hi', 'test', 1, 0, FALSE, 0)";
    }
    if ($company == 'spectra') {
        $query = 'INSERT INTO :company (item_sticker_id, item_name, item_description, item_quantity
        item_purchase_date, item_checked_out, item_checked_out_by) 
        VALUES (:sticker, :name, :desc, :quantity, :check, :checkby)';
    }

    $db = connectToDB(); 
    echo $query;

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
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}



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
?>
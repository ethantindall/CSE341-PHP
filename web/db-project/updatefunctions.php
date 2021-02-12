<?php

function addToDatabase($company, $stickerId, $name, $quantity, $purchaseDate, $checkedOut, $checkedOutDate, $checkedOutBy, $description) {
    if ($company == 'strata') {
        $query = 'INSERT INTO :company (item_sticker_id, item_name, item_description, 
                                        item_quantity, item_storage_location, item_purchase_date,
                                        item_checked_out, item_checked_out_date, item_checked_out_by) 
                VALUES (:sticker, :iname, :idesc, :quantity, 0, :purchase, :icheck, :checkdate, :checkby)';
    }
    if ($company == 'spectra') {
        $query = 'INSERT INTO :company (item_sticker_id, item_name, item_description, item_quantity
        item_purchase_date, item_checked_out, item_checked_out_date, item_checked_out_by) 
        VALUES (:sticker, :name, :desc, :quantity, :purchase, :check, :checkdate, :checkby)';
    }

    $db = connectToDB(); 

    $stmt = $db->prepare($query);
    echo $query;


    $stmt->bindValue(':company', $company, PDO::PARAM_INT);
    $stmt->bindValue(':sticker', $stickerId, PDO::PARAM_INT);
    $stmt->bindValue(':iname', $name, PDO::PARAM_STR);
    $stmt->bindValue(':idesc', $description, PDO::PARAM_INT);
    $stmt->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $stmt->bindValue(':purchase', $purchaseDate, PDO::PARAM_INT);
    $stmt->bindValue(':icheck', $checkedOut, PDO::PARAM_INT);
    $stmt->bindValue(':checkdate', $checkedOutDate, PDO::PARAM_INT);
    $stmt->bindValue(':checkby', $checkedOutBy, PDO::PARAM_INT);
    
    //$stmt->execute();

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
<?
    $host = "db5001940275.hosting-data.io";
    $database = "dbs1587646";
    $username = "dbu1178343";
    $password = "Jn57365!";
    
    try {
        $db = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    }
    catch (Exception $e) {
        echo "<pre>".print_r($e, true)."</pre>";
    }

    //echo "<pre>".print_r($db, true)."</pre>";
?>
<?
    
    include 'db_connection.php';

    $select = $db->prepare("SELECT name FROM inventory WHERE name LIKE '%".$_POST["search"]."%'");
    $select->execute();

    if($select->rowCount() > 0) {
        $results = $select->fetchALL(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            foreach ($row as $col) {
                echo "<li>$col</li>";
            }
        }
        //echo "<li>".$results["name"]."</li>";
    }
    else {
        echo "<li> No results. </li>";
    }
    
?>
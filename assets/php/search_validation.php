<?  
    include 'db_connection.php';

    if(isset($_POST["search-bar"])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $search = validate($_POST["search-bar"]);

        if (empty($search)) {
            header("Location: /search_results.php?msg=No results found.");
            exit();
        }
        else {
            $select = $db->prepare("SELECT * FROM inventory WHERE name=?");
            $select->bindparam(1, $search);
            $select->execute();
            if($select->rowCount() > 0) {
                $result= $select->fetch(PDO::FETCH_ASSOC);
                header("Location: /$search.php");
                exit();
            }
            else {
                header("Location: /search_results.php?msg=No results found.");
                exit();
            }
        }
    }
    else {
        header("Location: /search_results.php?msg=No results found.");
        exit();
    }
?>
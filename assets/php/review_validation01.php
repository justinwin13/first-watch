<?

    session_start();
    if (isset($_SESSION['username'])) {

        include 'db_connection.php';

        if(isset($_POST["review-input"]) && isset($_POST["stars"])) {
            function validate($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $item = "item01";
            $review = validate($_POST["review-input"]);
            $stars = validate($_POST["stars"]);
            $total_rating = 0;
            $row_count = 0.0;
            $avg_rating = 0.0;
            $null = "NULL";

            if (empty($review)) {
                header("Location: /item01.php?err=Review field cannot be empty.");
                exit();
            }
            else if (empty($stars)) {
                header("Location: /item01.php?err=Enter a rating.");
                exit();
            }
            else {
                try {
                    $insert = $db->prepare("INSERT INTO reviews VALUES (?, ?, ?, ?, ?)");
                    $insert -> bindparam(1, $_SESSION['username']);
                    $insert -> bindparam(2, $review);
                    $insert -> bindparam(3, $stars);
                    $insert -> bindparam(4, $item);
                    $insert -> bindparam(5, $null);
                    $insert -> execute();
                    
                    $select = $db->prepare("SELECT rating FROM reviews WHERE item=?");
                    $select->bindparam(1, $item);
                    $select->execute();

                    if($select->rowCount() > 0) {
                        $row_count = $select->rowCount();
                        $results= $select->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($results as $row) {
                            foreach ($row as $col) {
                                $total_rating += $col['rating'];
                            }
                        }

                        $avg_rating = $total_rating / $row_count;
                        $avg_rating = number_format($avg_rating, 1);

                        
                        // updates inventory item with new rating avg
        
                        $update = $db->prepare("UPDATE inventory SET rating=? WHERE name=?");
                        $update->bindparam(1, $avg_rating);
                        $update->bindparam(2, $item);
                        $update->execute();                   
                    }
    
                    header("Location: /item01.php?msg=Successfully submitted!");
                    exit();
                }
                catch (Exception $e) {
                    header("Location: /item01.php?err=An error occured. Please try again later.");
                    exit();
                }
            }
        }
    }
    else {
        header("Location: index.php");
        exit();
    }
?>
<?
    session_start();
    if (isset($_SESSION['username'])) {
        include 'db_connection.php';

        $item = "Sky-Dweller";
        $select = $db->prepare("SELECT username,review,rating FROM reviews WHERE item=?");
        $select->bindparam(1, $item);
        $select->execute();

        $results= $select->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            echo "<div class=\"user-review-box\">";
                echo "<div class=\"review-username\">";
                    echo $row['username'];
                echo "</div>";
                echo "<div class=\"review-rating\">";
                    echo $row['rating']." stars";
                echo "</div>";
                echo "<div class=\"review-paragraph\">";
                    echo $row['review'];
                echo "</div>";
            echo "</div>";
        }
    }
    else {
        header("Location: index.php");
        exit();
    }
?>
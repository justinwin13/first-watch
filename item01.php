<?
    session_start();
    if (isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/item-styles.css">
    <link rel="stylesheet" href="/assets/css/item01-styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/cecb91c862.js" crossorigin="anonymous"></script>
    <title>FirstWatch | Item01</title>
</head>
<body>
    <?
        include './assets/php/header.php';
        include './assets/php/db_connection.php';
    ?>
    <main>
        <?
            if(isset($_GET["err"])) {
                echo "<div class=\"error\" style=\"
                background-color: rgb(228, 189, 189);
                border: 1px solid rgb(201, 137, 137);
                border-radius: 5px;
                padding: 5px;
                color: rgb(179, 78, 78);
                font-family: 'Poppins';
                font-size: 16px;
                margin: 20px auto;
                text-align: center;
                width: 800px;\">".$_GET["err"]."</div>";
            }
            if(isset($_GET["msg"])) {
                echo "<div class=\"success\">".$_GET["msg"]."</div>";
            }
        ?>
        <div class="container">
            <div class="image-container">
                <h1 class="item-name">Item01</h1>
                <img src="/assets/images/item01.png">
            </div>
            <div class="detail-container">
                <h2 class="detail-header">Product Details</h2>
                <p class="product-detail">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus illum iste esse earum eum quibusdam doloremque, natus voluptas laudantium ullam totam dignissimos dicta ratione necessitatibus inventore. Iure nulla unde iste.
                </p>
                <div class="price">$
                    <?
                        $select = $db->prepare("SELECT * FROM inventory WHERE name='item01'");
                        $select->execute();
                        $result= $select->fetch(PDO::FETCH_ASSOC);
                        echo $result['price'];   
                    ?>  
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
                <p class="left-in-stock">
                    <?
                        $select = $db->prepare("SELECT * FROM inventory WHERE name='item01'");
                        $select->execute();
                        $result= $select->fetch(PDO::FETCH_ASSOC);
                        echo $result['stock'];   
                    ?> 
                    left in stock
                </p>
            </div>
        </div>
        <div class="review-input-container">
            <form action="./assets/php/review_validation01.php" method="POST">
                <h2 class="review-label">Add a written review</h2>
                <textarea type="text" id="review-input" name="review-input" placeholder="What did you like or dislike?" maxlength="255"></textarea>
                <h2 class="rating-label">Rate the product (1-5)</h2>
                <input type="number" id="stars" name="stars" min="0" max="5">
                <button type="submit" class="submit-review-btn">Submit Review</button>
            </form>
        </div>
        <div class="review-container">
            <h2 class="rating-header">Item Rating: <? 
                include 'db_connection.php';
                $select = $db->prepare("SELECT rating FROM inventory WHERE name='item01'");
                $select->execute();
                $results= $select->fetch(PDO::FETCH_ASSOC);
                echo $results['rating'];
             ?> stars</h2>
            <?  
                include './assets/php/draw_chart.php';
            ?>
            <div id="barchart_material" style="width: 700px; height: 400px; margin: 20px auto; z-index: 10;"></div>
            <div class="user-review-container">
                <?  
                    include './assets/php/review_queries.php';
                ?>
            </div>
        </div>
    </main>
    <script src="/assets/js/header-script.js"></script>
    <?
        include './assets/php/footer.php';
    ?>
</body>
</html>
<?
    }
    else {
        header("Location: index.php");
        exit();
    }
?>
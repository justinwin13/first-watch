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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/cecb91c862.js" crossorigin="anonymous"></script>
    <title>FirstWatch | Item02</title>
</head>
<body>
    <?
        include './assets/php/header.php';
        include './assets/php/db_connection.php';
    ?>
    <main>
        <div class="container">
            <div class="image-container">
                <h1 class="item-name">Item02</h1>
                <img src="/assets/images/item02.png">
            </div>
            <div class="detail-container">
                <h2 class="detail-header">Product Details</h2>
                <p class="product-detail">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus illum iste esse earum eum quibusdam doloremque, natus voluptas laudantium ullam totam dignissimos dicta ratione necessitatibus inventore. Iure nulla unde iste.
                </p>
                <div class="price">$
                    <?
                        $select = $db->prepare("SELECT * FROM inventory WHERE name='item02'");
                        $select->execute();
                        $result= $select->fetch(PDO::FETCH_ASSOC);
                        echo $result['price'];   
                    ?>  
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
                <p class="left-in-stock">
                    <?
                        $select = $db->prepare("SELECT * FROM inventory WHERE name='item02'");
                        $select->execute();
                        $result= $select->fetch(PDO::FETCH_ASSOC);
                        echo $result['stock'];   
                    ?> 
                    left in stock
                </p>
            </div>
            <div class="review-container">

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
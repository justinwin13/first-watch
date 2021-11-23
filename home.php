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
    <link rel="stylesheet" href="/assets/css/home-styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/cecb91c862.js" crossorigin="anonymous"></script>
    <title>FirstWatch | Home</title>
</head>
<body>
    <?php
        include './assets/php/header.php';
    ?>
    <main>
        <div class="search-bar-container">
            <form class="search-form" action="./assets/php/search_validation.php" method="POST" autocomplete="off">
                <div class="search-ajax-container">
                    <input type="text" name="search-bar" id="search-bar" placeholder="Search">
                    <div class="search-ajax">
                        <ul class="ajax-list">

                        </ul>
                    </div>
                </div>
            </form>
            <i class="fas fa-search"></i>
        </div>
        <div class="item-container">
            <div class="card item01">
                <img src="/assets/images/item01.png">
            </div>
            <div class="card item02">
                <img src="/assets/images/item02.png">
            </div>
            <div class="card item03">
                <img src="/assets/images/item03.png">
            </div>
            <div class="card item04">
                <img src="/assets/images/item04.png">
            </div>
            <div class="card item05">
                <img src="/assets/images/item05.png">
            </div>
            <div class="card item06">
                <img src="/assets/images/item06.png">
            </div>
            <div class="card item07">
                <img src="/assets/images/item07.png">
            </div>
            <div class="card item08">
                <img src="/assets/images/item08.png">
            </div>
        </div>

    </main>
    <?
        include './assets/php/footer.php';
    ?>
    <script src="/assets/js/header-script.js"></script>
    <script src="/assets/js/home-script.js"></script>
</body>
</html>
<?
    }
    else {
        header("Location: /index.php");
        exit();
    }
?>
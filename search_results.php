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
    <link rel="stylesheet" href="/assets/css/results-styles.css">
    <script src="https://kit.fontawesome.com/cecb91c862.js" crossorigin="anonymous"></script>
    <title>FirstWatch | Results</title>
</head>
<body>
    <?
        include './assets/php/header.php';
    ?>
    <main>
        <?
            if (isset($_GET["msg"])) {
                echo "<div class=\"no-result\">".$_GET["msg"]."</div>";
            }
        ?>
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
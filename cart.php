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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/cecb91c862.js" crossorigin="anonymous"></script>
    <title>FirstWatch | Cart</title>
</head>
<body>
    <main>
    <?
        include './assets/php/header.php';
    ?>
        Currently Not Available.

    <?
        include './assets/php/footer.php';
    ?>
    </main>
    <script src="/assets/js/header-script.js"></script>
</body>
</html>
<?
    }
    else {
        header("Location: index.php");
        exit();
    }
?>
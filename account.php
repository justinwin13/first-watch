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
    <link rel="stylesheet" href="/assets/css/account-styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/cecb91c862.js" crossorigin="anonymous"></script>
    <title>FirstWatch | Account</title>
</head>
<body>
    <?
        include './assets/php/header.php';
    ?>
    <main>
        <div class="account-card">
            <h1 class="account-header">My Account</h1>
            <div class="user-info-container">
                <div class="info-group">
                    <div class="column">First Name:</div>
                    <div class="column-2"><? echo $_SESSION['firstname']; ?></div>
                </div>
                <div class="info-group">
                    <div class="column">Last Name:</div>
                    <div class="column-2"><? echo $_SESSION['lastname'];; ?></div>
                </div>
                <div class="info-group">
                    <div class="column">Userame:</div>
                    <div class="column-2"><? echo $_SESSION['username'];; ?></div>
                </div>
                <div class="info-group">
                    <div class="column">Password:</div>
                    <div class="column-2"><? echo $_SESSION['password'];; ?></div>
                </div>
            </div>
            <button class="logout-btn">Logout</button>
        </div>
    </main>
    <script src="/assets/js/header-script.js"></script>
    <script src="/assets/js/account-script.js"></script>
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
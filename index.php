<?
    session_start();
    if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/index-styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>FirstWatch | Login / Register</title>
</head>
<body>
    <h1 class="logo-header">FIRST WATCH</h1>
    <div class="container">
        <div class="login-register-container">
            <div class="login-container">
                <h1 class="login-header">Log In</h1> 
                <form class="login-form" action="/assets/php/login_validation.php" method="POST">
                    <div class="form-group">
                        <label for="login-username">Username</label>
                        <input type="text" id="login-username" name="login-username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" name="login-password" placeholder="Enter Password">
                    </div>
                    <button class="login-btn" type="submit">Login</button>
                </form>
                <p class="forgot-username">Forgot your Username?</p>
                <p class="forgot-password">Forgot your Password?</p>
            </div>
            <div class="register-container">
                <h1 class="register-header">Register</h1>
                <form class="register-form" action="/assets/php/register_validation.php" method="POST">
                    <div class="form-group-2">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first-name" placeholder="Enter First Name">
                    </div>
                    <div class="form-group-2">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last-name" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group-2">
                        <label for="register-username">Username</label>
                        <input type="text" id="register-username" name="register-username" placeholder="Enter Username">
                    </div>
                    <div class="form-group-2">
                        <label for="register-password">Password</label>
                        <input type="password" id="register-password" name="register-password" placeholder="Enter Password">
                    </div>
                    <div class="form-group-2">
                        <label for="repassword">Re-Enter Password</label>
                        <input type="password" id="repassword" name="repassword" placeholder="Re-Enter Password">
                    </div>
                    <button class="register-btn" type="submit">Register</button>
                </form>
            </div>
        </div>
        <div class="card-container">
            <div class="card">
                <h1 class="card-header">
                    Welcome, Friend!
                </h1>
                <p class="card-desc">
                    First time here? Click below to sign up today!
                </p>
                <button class="card-btn">Sign Up</button>
            </div>
            <div class="card-2">
                <h1 class="card-header-2">
                    Welcome back!
                </h1>
                <p class="card-desc-2">
                    Already have an account? Click below to log in!
                </p>
                <button class="card-btn-2">Log In</button>
            </div>
        </div>
    </div>
    <?
            if(isset($_GET["reg-err"])) {
                echo "<div class=\"register-error\">".$_GET["reg-err"]."</div>";
                echo "<script> 
                        $(\".login-container\").hide(); 
                        $(\".register-container\").show();
                        $(\".card\").hide();
                        $(\".card-2\").show();
                    </script>";
            }
            if(isset($_GET["reg-msg"])) {
                echo "<div class=\"register-success\">".$_GET["reg-msg"]."</div>";
            }
            if(isset($_GET["login-err"])) {
                echo "<div class=\"login-error\">".$_GET["login-err"]."</div>";
            }
        
    ?>
    <script src="/assets/js/index-script.js"></script>
</body>
</html>
<?
    }
    else {
        header("Location: /home.php");
        exit();
    }
?>
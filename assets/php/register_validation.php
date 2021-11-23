<?
    include 'db_connection.php';

    if(isset($_POST["first-name"]) && isset($_POST["last-name"]) && isset($_POST["register-username"]) && isset($_POST["register-password"]) && isset($_POST["repassword"])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $firstname = validate($_POST["first-name"]);
        $lastname = validate($_POST["last-name"]);
        $username = validate($_POST["register-username"]);
        $password = validate($_POST["register-password"]);
        $repassword = validate($_POST["repassword"]);

        if (empty($firstname)) {
            header("Location: /index.php?reg-err=Enter a First Name");
            exit();
        }
        else if (empty($lastname)) {
            header("Location: /index.php?reg-err=Enter a Last Name");
            exit();
        }
        else if (empty($username)) {
            header("Location: /index.php?reg-err=Enter a Username");
            exit();
        }
        else if (empty($password)) {
            header("Location: /index.php?reg-err=Enter a Password");
            exit();
        }
        else if (empty($repassword)) {
            header("Location: /index.php?reg-err=Re-Enter your Password");
            exit();
        }
        else if ($repassword != $password) {
            header("Location: /index.php?reg-err=Password does not match");
            exit();
        }
        else {
            $select = $db->prepare("SELECT * FROM users WHERE username=?");
            $select->bindparam(1, $username);
            $select->execute();

            if($select->rowCount() > 0) {
                header("Location: /index.php?reg-err=Username is taken");
                exit();
            }
            else {
                try {
                    $insert = $db->prepare("INSERT INTO users VALUES (?, ?, ?, ?)");
                    $insert -> bindparam(1, $firstname);
                    $insert -> bindparam(2, $lastname);
                    $insert -> bindparam(3, $username);
                    $insert -> bindparam(4, $password);
                    $insert -> execute();
                    header("Location: /index.php?reg-msg=Successfully registered!");
                    exit();
                }
                catch (Exception $e) {
                    header("Location: /index.php?reg-err=Username not available");
                    exit();
                }
            }
        }
    }
    
?>
<?  
    session_start();
    include 'db_connection.php';
    if(isset($_POST["login-username"]) && isset($_POST["login-password"])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = validate($_POST["login-username"]);
        $password = validate($_POST["login-password"]);

        if (empty($username)) {
            header("Location: /index.php?login-err=Username required");
            exit();
        }
        else if (empty($password)) {
            header("Location: /index.php?login-err=Password required");
            exit();
        }
        else {
            $select = $db->prepare("SELECT * FROM users WHERE username=? AND password=?");
            $select->bindparam(1, $username);
            $select->bindparam(2, $password);
            $select->execute();
            if($select->rowCount() > 0) {
                $result= $select->fetch(PDO::FETCH_ASSOC);
                $_SESSION['firstname'] = $result['first_name'];
                $_SESSION['lastname'] = $result['last_name'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['password'] = $result['password'];
                header("Location: /home.php");
                exit();
            }
            else {
                header("Location: /index.php?login-err=Incorrect Username/Password");
                exit();
            }
        }
    }
    else {
        header("Location: /index.php");
        exit();
    }
?>
<!DOCTYPE html>

<?php
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("Location: /login/login.html ");        
    }
    include '../connectionDB.php';
?>

<html lang="en">
    <head>
        <title>Document</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">        
    </head>
    <body>
        <?php
            session_start();
            $email = $_POST['inputEmail'];
            $query = "SELECT * FROM utenti WHERE email=$1";
            $result = pg_query_params($dbconn, $query, array($email));
            //o la tupla c'è, o non c'è, essendo email primary key
            if($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                if(password_verify($_POST['inputPassword'], $line['pswd'])) {
                    $user = $line['username'];
                    // salvo dati per futuro uso
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['username'] = $line['username'];
                    $_SESSION['email'] = $email;
                    $_SESSION['picture'] = $line['picture'];
                    echo "Login successful. <br> Welcome $user!";
                    header("Location: ../Homepage.php");
                }
                else {
                    echo "The password you entered is incorrect.";
                }
            }
            else {
                echo "The e-mail you entered is not in out database. Create an account <a href=\"../registration/registration.html\">here</a>";
            }
            pg_close($dbconn);
        ?>
    </body>
</html>

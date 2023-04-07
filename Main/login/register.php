<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">        
    </head>
    <body>
        <?php
            $email = $_POST['inputEmail'];
            $dbconn = pg_connect("host=localhost user=postgres password=Snoopy99 port=5432 dbname=ForkMates");
            $query = "SELECT * FROM utenti WHERE email=$1";
            $result = pg_query_params($dbconn, $query, array($email));
            if($line=pg_fetch_array($result)) {
                echo "The email you entered is already in use! If you already have an account sign in <a href=\"../login/index.html\">here</a>.<br>
                      If you do not have an account, <a href=\"registration.html\">retry</a>.";
            }
            else {
                $username = $_POST['inputUsername'];
                $pswd = $_POST['inputPassword'];
                $query = "INSERT INTO utenti VALUES($1,$2,$3)";
                $result = pg_query_params($dbconn, $query, array($username, $email, $pswd));

                if($result) {
                    echo "Registration successful! Now you can <a href=\"../login/login.html\">login</a>";
                }
                else {
                    die("Error: registration failed. Try again!");
                }
            }
            pg_close($dbconn);
        ?>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">        
    </head>
    <body>     
        <?php
            if($_SERVER['REQUEST_METHOD'] != 'POST') {
                header("Location: /login/login.html ");        
            }
            include '../connectionDB.php';

            $email = $_POST['inputEmail'];
            $query = "SELECT * FROM utenti WHERE email=$1";
            $result = pg_query_params($dbconn, $query, array($email));
            if($line=pg_fetch_array($result)) {
                echo "The email you entered is already in use! If you already have an account sign in <a href=\"../login/index.html\">here</a>.<br>
                      If you do not have an account, <a href=\"registration.html\">retry</a>.";
            }
            else {
                $username = $_POST['inputUsername'];
                $pswd = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
                $check = "Non sono entrato";
                $hasImage = 0;
                if(isset($_FILES["inputImage"]) && $_FILES["inputImage"]["error"] == 0) {
                    $check = "Sono entrato";
                    $targetdir = '../users_pictures/';
                    $parsedUsername = str_replace(array(" ", "'"), "", $username);
                    $targetfile = $targetdir . $parsedUsername . ".jpeg";
                    move_uploaded_file($_FILES["inputImage"]["tmp_name"], $targetfile);
                    $hasImage = 1;
                }

                $query = "INSERT INTO utenti VALUES($1,$2,$3,$4,$5,$6)";
                $result = pg_query_params($dbconn, $query, array($username, $email, $pswd, 0, 0, $hasImage));

                if($result) {
                    echo "Registration successful! Now you can <a href=\"../login/login.html\">login</a>";
                    echo "hasImage = $hasImage";
                    echo $check . "\n";
                    echo isset($_FILES['inputImage']) . " - ";
                    echo $_FILES['inputImage']['error'];
                }
                else {
                    die("Error: registration failed. Try again!");
                }
            }
            pg_close($dbconn);
        ?>
    </body>
</html>

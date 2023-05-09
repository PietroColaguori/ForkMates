<?php
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        header("Location: /add_recipe/add_recipe.html ");        
    }
    include '../connectionDB.php';
?>      
        <?php
            session_start();

            if(isset($_POST['submit'])) {

                $title = $_POST['inputTitle'];
                $category = $_POST['inputCategory'];
                if(isset($_POST['inputDescription'])) {
                    $description = $_POST['inputDescription'];
                }
                else {
                    $description = NULL;
                }
                $ingredients = $_POST['inputIngredients'];
                $procedure = $_POST['inputProcedure'];

                $hasImage = 0;
                
                if(isset($_FILES["inputPic0"]) && $_FILES["inputPic0"]["error"] == 0) {
                    //$image = $_FILES["inputPic0"]["tmp_name"];
                    //$imgContent = addslashes(file_get_contents($image));
                    // Salvo immagine in apposita directory
                    $targetdir = '../recipes_pictures/';
                    $parsedTitle = str_replace(array(" ", "'"), "", $title);
                    $targetfile = $targetdir . $parsedTitle . $_SESSION['username'] . ".jpeg";
                    move_uploaded_file($_FILES["inputPic0"]["tmp_name"], $targetfile);
                    $hasImage = 1;
                }

                // TO-DO: inserire array di immagini

                $difficulty = $_POST['inputDifficulty'];
                $prepTime = $_POST['inputPrepTime'];
                $cookTime = $_POST['inputCookTime'];
                $numPeople = $_POST['inputNumPeople'];

                $query = "INSERT INTO ricette VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11)";
                $result = pg_query_params($dbconn, $query, array($title, $category, $description, $ingredients, $procedure, $_SESSION['username'], $difficulty, $prepTime, $cookTime, $numPeople, $hasImage));
                
                $query2 = "UPDATE utenti SET ricette = ricette + 1 WHERE username = $1";
                $result2 = pg_query_params($dbconn, $query2, array($_SESSION['username']));

                if($result) {
                    $id = $_SESSION['username'];
                    header('Location: ../profile/profile.php?param='.$id.'');
                }
                else { die("An error occurred!"); }

                pg_close($dbconn);
            }
            else {
                header("Location: /add_recipe/add_recipe.html ");
            }
        ?>


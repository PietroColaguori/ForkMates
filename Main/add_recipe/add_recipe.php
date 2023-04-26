
        <?php
            session_start();

            if(isset($_POST['submit'])) {
                $dbconn = pg_connect("host=localhost user=postgres password=Snoopy99 port=5432 dbname=ForkMates");       

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
                
                if(isset($_FILES["inputPic0"]) && $_FILES["inputPic0"]["error"] == 0) {
                    $image = $_FILES["inputPic0"]["tmp_name"];
                    $imgContent = addslashes(file_get_contents($image));
                }

                $query = "INSERT INTO ricette VALUES ($1, $2, $3, $4, $5, $6, $7)";
                $result = pg_query_params($dbconn, $query, array($title, $category, $description, $ingredients, $procedure, pg_escape_bytea($imgContent), $_SESSION['username']));
                
                if($result) {
                    echo "<p style=\"color:green\">Your recipe has been successfully added!</p>";
                }
                else { die("An error occurred!"); }

                pg_close($dbconn);
            }
            else {
                header("Location: /add_recipe/add_recipe.html ");
            }
        ?>


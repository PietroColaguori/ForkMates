<!DOCTYPE html>

<?php
    include 'connectionDB.php';
?>

<head>


    <link rel="stylesheet" href="css/home_style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/cards.css">
        <link rel="stylesheet" href="css/pagefooter.css">
        <link rel="stylesheet" href="css/rating.css">
        <link rel="stylesheet" href="css/separator.css">
        <link rel="stylesheet" href="css/recipestyle.css">
        

</head>
<body>
  <!-- NAVIGATION BAR-->
<main>
  <?php
// replace these with your database connection details
session_start();
error_reporting(E_ALL ^ E_WARNING);
  if($_SESSION['loggedIn'] == true) {
    $id = $_SESSION['username'];
    echo "<div class='topnav'>
        <img element id = 'logo' src='icons/cooking.png'/> 
        <a class=\"active\" href=\"Homepage.php\">ForkMates</a>

        <a href='add_recipe/add_recipe.html'>Add a recipe</a>
        <a href='profile/profile.php?param=".$id."'>Your Profile</a>
        <a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">Contact us</a>
        <a href='logout.php'>Logout</a>
        <div class=\"search-container\">
            <form action=\"/ricerca_ricetta.php\">
              <input id=\"searchbar\" type=\"text\" placeholder=\"Search a Recipe!\" name=\"search\" size=\"50\" autocomplete=\"off\">
              <button type=\"button\" class='btn btn-light'>Search</button>
            </form>
        </div>
    </div>";
  }
  else {
    echo "<div class='topnav'>
        <img element id = 'logo' src='icons/cooking.png'/> 
        <a class=\"active\" href=\"Homepage.php\">ForkMates</a>
        <a href=\"login/login.html\">Sign In</a>
        
        <a href=\"registration/registration.html\">Sign Up</a>
        <a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">Contact us</a>
        <div class=\"search-container\">
            <form action=\"/ricerca_ricetta.php\">
              <input id=\"searchbar\" type=\"text\" placeholder=\"Search a Recipe!\" name=\"search\" size=\"50\" autocomplete=\"off\">
              <button type=\"submit\">Search</button>
            </form>
          </div>
    </div>";
  }
$param = $_GET['param'];
$query = "SELECT * FROM ricette WHERE titolo='$param'";
$result = pg_query_params($dbconn, $query, []);
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    $title = $line["titolo"];
    $description = $line["descrizione"];
    $ingredients = $line["ingredienti"];
    $difficulty = $line['difficulty'];
    $prepTime = $line['prep_time'];
    $cookTime = $line['cooking_time'];
    $people = $line['people'];
    $utente = $line['utente'];
    $hasImage = $line['image'];
    if($hasImage) {
      $parsedTitle = str_replace(array(" ", "'"), "", $title);
      $imagePath = './recipes_pictures/' . $parsedTitle . $utente . '.jpeg';
    }
    else {
      $imagePath = './icons/ricetta.jpeg';
    }
}
?>

<!--RECIPE CARDS-->



  <div class="container" name = "CARTA RICETTA">
    <div class="row-gy-5">
      <div class="col-md-6">
          <div id="card-container">
                   <!--ALL THE VALUES IN HERE WILL BE EXTRACTED FROM THE DB-->
                   <!-- WE NEED TO ADD A CHAR LIMIT TO THE TITLE AND DETAILS-->
              <div id="card-title"><?php echo "$title"; ?>
              </div>
              <a href="recipe.html">
                  <img element id ="recipe-image" src="<?php echo "$imagePath" ?>">
              </a>
          </div>
      </div>
      <div class="col-md-6">
        <div id="card-container2">
          <div id="details">
            <span class="detail-value">
                <img element id = "icon" src="icons/chef.png"/> 
                    Difficulty: <?php echo "$difficulty"; ?> 
            </span>
            <span class="detail-value">
                <img element id = "icon" src="icons/rolling-pin.png"/> 
                Prep Time: <?php echo $prepTime . " minutes"; ?>
            </span>
            <span class="detail-value"> 
                <img element id = "icon" src="icons/cooking.png"/> 
                Cooking: <?php echo $cookTime . " minutes"; ?>
            </span>
            <span class="detail-value">
                <img element id = "icon" src="icons/plate.png"/> 
                Recipe for: <?php echo $people . " people"; ?>
            </span>
            <span class="detail-value">
                <div class="separator">
                    <div class="separator__content">
                    </div>
                    <div name="Separator"></div>
                    <!-- Separator line -->
                    <div class="separator__separator">
                    </div>
                    <div class="rating">
                        <button class="rating__star">☆</button>
                        <button class="rating__star">☆</button>
                        <button class="rating__star">☆</button>
                        <button class="rating__star">☆</button>
                        <button class="rating__star">★</button>
                  </div>
                </div>
              </span>
            </div>
          </div>  
        </div>
      </div>
    </div> 
  </div>


  <div class="container" name = "PRESENTAZIONE">
    <div class="row">
      <div class="col-md-3">
        <div id='ingredient-title'>
          INGREDIENTS:
        </div>
        <div id="ingredients">
        <?php echo "$ingredients"; ?>
        </div>
        <button onclick="download()" class="button3">Download the ingredients!</button>
        <script type="text/javascript">
          function download() {
              var a = document.body.appendChild(
                 document.createElement("a")
              );
             a.download = "Ingredients.html";
             a.href = "data:text/html," + document.getElementById("ingredients").innerHTML;
             a.click(); //Trigger a click on the element
          }
      </script>
  
      </div>
      <div class="col-md-9">
        <div id='ingredient-title'>
          PRESENTAZIONE: 
        </div>
        <div id='ingredients'>
          <?php echo "$description"; ?>
        </div>
      </div>
    </div>
  </div> 
</main>



  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">ForkMates is a univeristy project were people can upload their own recipe, review and read other recipe. This is a FREE and NO PROFIT project, nobody earned money during the production</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Used languages</h6>
          <ul class="footer-links">
            <li>HTML</li>
            <li>PHP</li>
            <li>JAVASCRIPT</li>
            <li>POSTGRESQL</li>
            <li>UX DESIGN</li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick links</h6>
          <ul class="footer-links">
            <li><a href="">About</a></li>
            <li><a href="">Contacts</a></li>
            <li><a href="">Contributes</a></li>
            <li><a href="">Privacy policy</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by 
       <a href="#">CC</a> and <a href="#">PC </a>
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
          </ul>
        </div>
      </div>
    </div>
</footer>
</body>

<!DOCTYPE html>
<html>
<head>
 <title>ForkMates</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="css/home_style.css">
 <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <!--LINK TO CARDS.CSS AND BOOTSTRAP-->
     <link rel="stylesheet" href="css/cards.css">
     <link rel="stylesheet" href="css/pagefooter.css">
     <link rel="stylesheet" href="css/rating.css">
     <link rel="stylesheet" href="css/separator.css">
     <script src="js/myjquery.js"></script>
     <script src="js/jquery-3.6.0.min.js"></script>
          <script src="./prova.js" type="text/javascript"></script>

     <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- added -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- MODAL DIALOG --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- AUTOCOMPLETE SEARCH -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>


<?php
  include 'connectionDB.php';
  session_start();
  error_reporting(E_ALL ^ E_WARNING);
?>

<!-- MODAL DIALOG CONTACT US-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">About ForkMates.com</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <p>This website was created by Pietro Colaguori and Claudio Cambone for the course "Languages and Technologies for the Web" at 
        "La Sapienza" University of Rome. The purpose of the website is to enable its users to quickly and easily browse through
        various recipes, to add their own recipes and to get every day new suggestions about what to eat!
        If you want you can contact us to report a bug or make a donation!</p><br><hr>
        <label class="form-label" for="donation">Make a donation! (1$ minimum)</label>
        <input min="1" max="100" type="number" id="donation" class="form-control" /><br>
        <button type="button" class="btn btn-success">Make Donation</button><br><br>
        <label class="form-label" for="report">Report a bug!</label>
        <textarea class="form-control" id="report" rows="3"></textarea><br>
        <button type="button" class="btn btn-primary">Report</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- NAVIGATION BAR-->

<?php
  $query = "SELECT titolo FROM ricette";
  $result = pg_query($dbconn, $query);
  $ricette = array();
  while($row = pg_fetch_assoc($result)) {
    $ricette[] = $row['titolo'];
  }
  $ricette_json = json_encode($ricette);

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
        <a class=\"active\" href=\"Homepage.html\">ForkMates</a>
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
?>

<!-- SET AUTOCOMPLETE FOR SEARCHBAR -->
<script>
  $(document).ready(function () {
    $("#searchbar").autocomplete({
      source: <?php echo $ricette_json; ?>
    });
  });
</script>

<br>
 <!--QUICK SEARCH BUTTONS-->
<div id="Quick Search">

<!--PROVA DA ELIMINARE-->
<div class ="center">
  <button onclick="window.location.href='Pages/login.html'" class="button" role = "button">Entries</button>
  <button class="button" role="button">Main Dishes</button>
  <button class="button" role="button">Second courses</button>
  <button class="button" role="button">Desserts</button>
</div>
<div class = "center">  
  <button class="button2">Your recipes of the day!</button>
</div>
</div>

<!-- SCRIPT TO REDIRECT PAGE-->
<script>
		function goToPage() {
			window.location.href = "redirect.html";
		}
	</script>


<!--RECIPE CARDS-->
<div class="container">
  <div class="row">
      <?php
            $query = "SELECT * FROM ricette";
            $result = pg_query_params($dbconn, $query, []);
            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                $title = $line["titolo"];
                $utente = $line['utente'];
                $difficulty = $line["difficulty"];
                $prep_time = $line["prep_time"];
                $people = $line["people"];
                $cooking = $line["cooking_time"];
                $hasImage = $line['image'];
                $stars = Array(1,2,3,4,5);
                if($hasImage) {
                  $parsedTitle = str_replace(array(" ", "'"), "", $title);
                  $imagePath = './recipes_pictures/' . $parsedTitle . $utente . '.jpeg';
                }
                else {
                  $imagePath = './icons/ricetta.jpeg';
                }
                //<!-- MODAL DIALOG RATINGS -->
            echo '            
                <div id="ratings'.$title.''.$utente.'" class="modal fade" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                    
                      <h1 text-align="center">Leave a Review</h1>
                        <button class="btn-close" data-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                      <form method="POST" action="rating.php">
                      <p class="modal-interface">Recipe Name: </p>
                      <input class="modal-title" name="titolo" value='.$title.' readonly>
                      <p class="modal-interface">Chef:</p>
                      <input class="modal-title" name="utente" value='.$utente.' readonly>
                      <p class="modal-interface"> How many stars you want to leave? </p>

                      <select name="stars" id="selezione" class="rating__star" aria-label="Default select example">
                        <option value="1" name="1s">★</option>
                        <option value="2" name="2s">★★</option>
                        <option value="3" name="3s">★★★</option>
                        <option value="4" name="4s">★★★★</option>
                        <option value="5" name="5s" selected>★★★★★</option>
                      </select>

                      <p class="modal-interface">You want to leave a Comment?</p>
                      </div>
                      <textarea name="recensione" class="textmodal" id="report" rows="3"> </textarea>
                      <div class="modal-footer">
                      <button class="button5" data-dismiss="modal">Close</button>
                      <input type="submit" class="button4" value="Confirm Review">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>';


                //CARDS VISUALIZATION
            echo'
            <div class="col-sm-3">
                <div id="card-container">
                    <div id="card-title">'.$title.'</div>
                    <a href="recipe.php?param='.$title.'">
                        <img element id ="recipe-image" src='.$imagePath.'>
                    </a>
                    <div id="details">
                        <span class="detail-value">
                            <img element id = "icon" src="icons/chef.png"/> 
                            Difficulty: '.$difficulty.'
                        </span>
                        <span class="detail-value">
                            <img element id = "icon" src="icons/rolling-pin.png"/> 
                            Prep Time: '.$prep_time.'
                        </span>
                        <span class="detail-value"> 
                            <img element id = "icon" src="icons/cooking.png"/> 
                            Cooking: '.$cooking.'
                        </span>
                        <span class="detail-value">
                            <img element id = "icon" src="icons/plate.png"/> 
                            Recipe for: '.$people.'
                        </span>
                        <span class="detail-value">
                            <div class="separator">
                                <div class="separator__content">
                                </div>
                                <div class="separator__separator">
                                </div>';
                                
                              if($_SESSION['loggedIn'] == true) {
                              $id = $_SESSION['username'];
                              //MODAL TO LEAVE A REVIEW
                              echo"
                                <div class='rating'>
                                    <button class='rating__star' data-target='#ratings".$title."".$utente."' data-toggle='modal' onclick='#' name='1s' >☆</button>
                                    <button class='rating__star' data-target='#ratings".$title."".$utente."' data-toggle='modal' onclick='#' name='2s'>☆</button>
                                    <button class='rating__star' data-target='#ratings".$title."".$utente."' data-toggle='modal' onclick='#' name='3s'>☆</button>
                                    <button class='rating__star' data-target='#ratings".$title."".$utente."' data-toggle='modal' onclick='#' name='4s'>☆</button>
                                    <button class='rating__star' data-target='#ratings".$title."".$utente."' data-toggle='modal' onclick='#' name='5s' onclick='showvalue()'>★</button>";
                              }
                              else{
                                echo'
                                <div class="rating">
                                    <button class="rating__star" onclick="goToPage()">☆</button>
                                    <button class="rating__star" onclick="goToPage()">☆</button>
                                    <button class="rating__star" onclick="goToPage()">☆</button>
                                    <button class="rating__star" onclick="goToPage()">☆</button>
                                    <button class="rating__star" onclick="goToPage()">★</button>';

                              }
                              echo'
                                </div>
                            </div>
                        </span>
                    </div>  
                </div>
            </div>';
        }
        ?>
  </div>
</div>   


<!-- Site footer -->
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <h6>About</h6>
        <p class="text-justify">ForkMates is a univeristy project were peapole can upload their own recipe, review and read other recipe. This is a FREE and NO PROFIT project, nobody earned money during the production</p>
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
</html>
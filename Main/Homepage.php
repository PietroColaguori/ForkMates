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
     <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- added -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- MODAL DIALOG --> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>


<?php
  session_start();
  error_reporting(E_ALL ^ E_WARNING);
?>

<!-- MODAL DIALOG -->
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
  if($_SESSION['loggedIn'] == true) {
    echo "<div class='topnav'>
        <img element id = 'logo' src='icons/cooking.png'/> 
        <a class=\"active\" href=\"Homepage.php\">ForkMates</a>

        <a href='add_recipe/add_recipe.html'>Add a recipe</a>
        <a href='profile/profile.php'>Your Profile</a>
        <a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">Contact us</a>
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

<br>
 <!--RECIPE CARDS-->
 <div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div id="card-container">
                     <!--ALL THE VALUES IN HERE WILL BE EXTRACTED FROM THE DB-->
                     <!-- WE NEED TO ADD A CHAR LIMIT TO THE TITLE AND DETAILS-->
                <div id="card-title">Recipe of Porco Dio
                </div>
                <a href="recipe.html">
                    <div id="recipe-image" class="img-thumbnail">
                    </div>
                </a>
                <div id="details">
                    <span class="detail-value">
                        <img element id = "icon" src="icons/chef.png"/> 
                            Difficulty: easy 
                    </span>
                    <span class="detail-value">
                        <img element id = "icon" src="icons/rolling-pin.png"/> 
                        Prep Time: 10 minutes
                    </span>
                    <span class="detail-value"> 
                        <img element id = "icon" src="icons/cooking.png"/> 
                        Cooking: 55 minutes 
                    </span>
                    <span class="detail-value">
                        <img element id = "icon" src="icons/plate.png"/> 
                         Recipe for: 2 People
                    </span>
                    <span class="detail-value">
                        <div class="separator">
                            <div class="separator__content">
                            </div>
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

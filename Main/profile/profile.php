<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- NAVBAR -->
        <link rel="stylesheet" href="../css/home_style.css">
        <!-- MODAL DIALOG -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <!-- PROFILE -->
        <link rel="stylesheet" href="profile.css">
    </head>
    <body>

        <?php session_start(); ?>

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
        <!-- END OF MODAL DIALOG SECTION -->

        <!-- NAVIGATION BAR -->
        <div class='topnav'>
            <img element id = 'logo' src='../icons/cooking.png'/> 
            <a class="active" href="../Homepage.php">ForkMates</a>
    
            <a href='../add_recipe/add_recipe.html'>Add a recipe</a>
            <a href='#'>Your Profile</a>
            <a href="#" data-toggle="modal" data-target="#myModal">Contact us</a>
            <div class="search-container">
                <form action="/ricerca_ricetta.php">
                  <input type="text" placeholder="Search a Recipe!" name="search" size="50">
                  <button type="button" class='btn btn-light'>Search</button>
                </form>
              </div>
        </div>
        <!-- END OF NAVIGATION BAR SECTION -->

        <!-- PROFILE -->
        <!-- PROFILE HEADER SECTION -->
        <div class="profile">
            <div class="profile_image">
                <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">
            </div>
            <div class="profile_user_settings">
                <h1 class="profile_user_name"><?php echo $_SESSION['username'] ?></h1>
                <button class="btn profile-edit-btn">Edit Profile</button>
            </div>
            <div class="profile_stats">
                <ul>
                    <li><span class="public_email"> <?php echo $_SESSION['email'] ?> </span></li>
                    <li><span class="n_published">10 Recipes Published</span></li>
                    <li><span class="n_reviewed">20 Recipes Reviewed</span></li>
                </ul>
            </div>
        </div>
        <!-- END OF PROFILE HEADER SECTION -->
        <!-- PROFILE BODY SECTION -->
        <h2>Visualizzazione cards</h2>
        <!-- END OF PROFILE BODY SECTION -->
        <!-- END OF PROFILE SECTION -->

    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--CSS-->
  <link rel="stylesheet" href="css/Main.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Big Green Planet</title>
  <link rel="icon" href="images/CuteEarthLogo.png">
  <!--Navigation Bar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="images/Logo.png" width="205" height="80" alt="Big Green Planet">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active" style="font-size:30px">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php
        if (isset($_SESSION['name']) && $_SESSION['role']=="Admin" || isset($_SESSION['name']) && $_SESSION['role']=="Member")
        {
        ?>
        <li class="nav-item" style="font-size:30px">
          <a class="nav-link" href="News.php">News</a>
        </li>
        <?php
        }
        ?>
        <li class="nav-item" style="font-size:30px">
          <a class="nav-link" href="AboutUs.php">About Us</a>
        </li>
        <?php
        if (isset($_SESSION['name']) && $_SESSION['role']=="Admin")
        {
        ?>
        <li class="nav-item" style="font-size:30px">
          <a class="nav-link" href="Adminindex.php">Manage Posts</a>
        </li>
        <?php
        }
        ?>
        <?php
        if(!isset($_SESSION['name']))
        {
        ?>
        <li class="nav-item" style="font-size:30px">
          <a class="nav-link" href="Login.php">Login</a>
        </li>
        <?php
        }
        else
        {
        ?>
        <li class="nav-item" style="font-size:30px">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </nav>
</head>

  <body>
  
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/slider/slide1.jpg" class="d-block w-100" alt="...">
            <div class="text_on_image">
              <h2><span>Welcome to Big Green Planet<br />Feed the Planet and It Will Nourish You</span></h2>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/slider/slide2.jpg" class="d-block w-100" alt="...">
            <div class="text_on_image">
              <h2><span>Welcome to Big Green Planet<br />Feed the Planet and It Will Nourish You</span></h2>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/slider/slide3.jpg" class="d-block w-100" alt="...">
            <div class="text_on_image">
              <h2><span>Welcome to Big Green Planet<br />Feed the Planet and It Will Nourish You</span></h2>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <br />
      <h1 align="center">Current charity events by 3rd party organisations</h1>
      <br />
      <div class="container">
          <div class="row">
            <div class="col-4-lg ml-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="images/c/teamtreeslogo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">#TeamTrees</h5>
                      <p class="card-text" align="justify">Team Trees, also known as TeamTrees or #TeamTrees, is a 2019 collaborative fundraising challenge 
                        aiming to raise 20 million U.S. dollars by 2020 to plant 20 million trees. The initiative was started by American YouTubers 
                        MrBeast and Mark Rober, and is mostly supported by YouTubers.</p>
                      <a href="https://teamtrees.org/" class="btn btn-primary">Donate</a>
                    </div>
                  </div>
            </div>
            <div class="col-4-lg ml-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="images/c/wwflogo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Australia Bushfire Emergency</h5>
                      <p class="card-text" align="justify">Across the country, over 10 million hectares of Australian land has been burned to the ground. Over 1 billion animals 
                        have lost their lives so far, including thousands of koalas, kangaroos, wallabies, birds and other iconic wildlife. </p>
                      <a href="https://bit.ly/30v7EHK" class="btn btn-primary">Donate</a>
                    </div>
                  </div>
            </div>
            <div class="col-4-lg ml-3 mb-3 ">
                <div class="card" style="width: 18rem;">
                    <img src="images/c/worldanimalprotection.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">World Animal Protection</h5>
                      <p class="card-text" align="justify">Right now, our country (Australia) is burning. Our precious wildlife, pets and farm animals are at risk. 
                        These innocent animals need our help now and in the future!</p>
                      <a href="https://bit.ly/2TzWsrF" class="btn btn-primary">Donate</a>
                    </div>
                  </div>
            </div>
          </div>
      </div>
      <!-- Footer -->
      <footer id="sticky-footer" class=" bg-dark text-white-50">
        <div class="container text-center">
          <small>Copyright &copy; BigGreenPlanet.com</small>
        </div>
      </footer>
      <!-- Footer -->

      <script>
        $(document).ready(function(){

          $('.col-4-lg').hover(
            function(){
              $(this).animate({
                marginTop: "-=30px",
              },200);
            },

            function(){
              $(this).animate({
                marginTop: "0%"
              },200);
            }
          );
        });
      </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>

</html>

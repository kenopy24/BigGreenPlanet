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
  <link rel="stylesheet" href="css/news.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>News</title>
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
    <section class="py-5">
      <div class="container">
            <h1>Search</h1>
            Post Title: <input type="text" id="search" required />
            <input type="button" id="btnSearch" value="Search"></input><br/>
            <div id="display"></div>
            <div id="test"></div>
        </div>
    </section>
    
      <!-- Footer -->
      <footer id="sticky-footer" class=" bg-dark text-white-50">
        <div class="container text-center">
          <small>Copyright &copy; BigGreenPlanet.com</small>
        </div>
      </footer>
      <!-- Footer -->

    <!--jquery-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    $("document").ready(function(){
        $("#search").keyup(function(){

            var postTitle = $("#search").val();
            if(postTitle == "") {
                $("#display").html("");
            }
            else
            {
                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: {
                        search_post:1,
                        searchTitle: postTitle
                    },
                    success: function(respond){
                        $("#display").html(respond).show();
                        $('#test').hide();
                    }
                });
            }
        });

        $("#btnSearch").click(function() {
            var postTitle = $("#search").val();
            $.ajax({
                type: "POST",
                url: "process.php",
                data: {
                    display_post: 1,
                    searchTitle: postTitle
                },
                success: function(respond) {
                    $("#test").html(respond).show();
                    
                }
            });
        });
      });
      
      function insert(data) {
        $("#search").val(data);
        $("#display").hide();
      }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>

</html>

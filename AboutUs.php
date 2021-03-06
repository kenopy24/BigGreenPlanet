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
  <link rel="stylesheet" href="css/ParallaxScrolling.css">
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>About Us</title>
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
        
        <div class="pimg1">
            <div class="ptext">
                <span class="border">
                    About Us
                </span>
            </div>
        </div>
        
        <section class="section section-light">
            <p>
              The Big Green Planet is a newly established website which 
              connects other environmentalist or similar liked minded individuals 
              together. Furthermore, our website offers lots of tips and information 
              on how to save the environment. Our website also promotes any ongoing 
              3rd party charity organization and report any news regarding the environment 
              of our beloved planet Earth.
            </p>
        </section>

        <div class="pimg2">
            <div class="ptext">
                <span class="border">
                    Our Goal
                </span>
            </div>
        </div>

        <section class="section section-dark">
            <p>
              Our goal is to spread environmental awareness using the power of the internet and also making this website as a 
              main hub for all environmentalist and people with the same interest to discuss and share anything environmental related topics.
            </p>
        </section>

        <div class="pimg3">
          <div class="ptext">
              <span class="border">
                  Contact Us
              </span>
          </div>
      </div>

      <section class="section section-light">
          <div class="container">
          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                <p>
                    If you have any suggestions on how to improve our website or to improve our services, you can contact us
                    by filling up the form on your right.
                </p>

                <p>
                 Address: Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</a>
                </p>
               
                <p>
                  Phone: + 03-8996 1000
                </p>
              </div>
              <!-- contact form -->
              <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                  <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                      <!-- Name -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="name">Name</label>
                        <input class="form-control" id="txtName" type="text" name="name" required data-error="Please enter your name">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- Subject -->
                      <div class="form-group label-floating">
                        <label class="control-label">Subject</label>
                        <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- Message -->
                      <div class="form-group label-floating">
                          <label for="message" class="control-label">Message</label>
                          <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                          <div class="help-block with-errors"></div>
                      </div>
                      <!-- Form Submit -->
                      <div class="form-submit mt-5">
                          <button class="btn btn-primary" type="submit" id="btnSubmit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                          <div id="btnSubmit" class="h3 text-center hidden"></div>
                          <div class="clearfix"></div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      </section>

        <!-- Footer -->
        <footer id="sticky-footer" class=" bg-dark text-white-50">
            <div class="container text-center">
                <small>Copyright &copy; BigGreenPlanet.com</small>
            </div>
        </footer>
        <!-- Footer -->
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	      <!-- JS for tab -->
	      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
          $(document).ready( function(){
  			
          $("#btnSubmit").click( function() {
            var isValid = true;
            $('input[type="text"]').each(function() {
            if($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    "background": "#FFCECE"
                });
            }
            else{
                $(this).css({
                    "border": "",
                    "background": ""
                });
            }
            });
            if(isValid == false)
                e.preventDefault();
            else
                alert("Thank you "+$("#txtName").val()+"for your feedback");
        });
        });
      </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

</html>

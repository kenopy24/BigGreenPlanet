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
  <link rel="stylesheet" href="css/News.css">
  <link rel="stylesheet" href="css/Admin.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Add Posts</title>
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
          <a class="nav-link" href="Adminindex.php">Manage Posts</a>
        </li>
        <li class="nav-item active" style="font-size:30px">
            <a class="nav-link" href="index.php">Public</a>
          </li>
        <li class="nav-item" style="font-size:30px">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</head>

  <body>
    <div class="admin-content">
      <div class="button-group">
        <br> 
        <br>
        <a href="create.php" class="btn btn-primary">Add Post</a>
        <a href="Adminindex.php" class="btn btn-primary">Manage Post</a>
      </div>

    </div>

    <section class="py-5">
      <div class="container">
        <form id="frmAddPost">
            <h1>Add Article</h1>
            Post Title: <input type="text" id="postTitle" name="pT" required><br />
            Post Author: <input type="text" id="postAuthor" name="pA" required><br />
            Post Body: <textarea rows="3" id="postBody" name="pB" > </textarea><br />
            <input type="file" id="postImg" name="pI" /><br/>
            <input type="submit" value="Add" name="btnSubmit">
        </form>
        </div>
    </section>

  
    
      
    <!--JQuery-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    $("document").ready(function(){
    $("#frmAddPost").on('submit',(function(e) {
    e.preventDefault();

    var fdata = new FormData(this);

        $.ajax({
          url: "process.php",
          type: "POST",
          data: fdata,
          contentType: false,
          cache: false,
          processData: false,
          success: function(response)
          {
              alert(response);
              $('#postTitle').val('');
              $('#postAuthor').val('');
              $('#postBody').val('');
              $('#postImg').val('');
          }
      });
    }));
    });
    </script>

   
   
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>

</html>
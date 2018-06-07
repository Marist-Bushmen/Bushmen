<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bushmen - Quotes</title>
    <link rel="shortcut icon" type="img/png" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/cyborg/bootstrap.min.css" >
  </head>
  <body>
  <?php
  //Show all error messages
  ini_set('display_errors', true);
  error_reporting(E_ALL);

  //require files for connection to database, inputing records into db
  //and displaying the records on the page
  require('../scripts/connect_db.php');
  require('../scripts/inputRecord.php');
  require('../scripts/showRecord.php');
  require('../scripts/deleteRecord.php');
  require('../scripts/search_db.php');
  ?>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="bushmen.php">Bushmen</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="bushmen.php">Quotes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addQuote.php">Add Quote</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
      <form method="POST" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" name="SearchVAR" placeholder="Search" type="text" value="<?php if(isset($_POST['SearchVAR'])) echo $_POST['SearchVAR'];?>">
        <button class="btn btn-secondary my-2 my-sm-0" name="search" type="submit">Search</button>
      </form>
    </div>
  </nav>

    <div class="jumbotron jumbotron-fluid text-white bg-dark text-center">
        <div class="container" style="height="10%"">
          <h1>Bushmen Quotes</h1>
          <p>Words uttered by various members of the Bushmen throughout the years </p>
        </div>
    </div>

    <div class="container text-muted">
        <div class="modal fade" id="cfrmDel">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h2 class="modal-title">Confirm Delete</h2>
                         <button type="button" class="close" data-dismiss="modal">
                             <span>&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <p>Are you sure you want to remove this quote from the database?</p>
                     </div>
                     <div class="modal-footer">
                         <form method="POST">
                             <input type=hidden value="<?php if(isset($_POST['submit_btn_id'])) echo $_POST['submit_btn_id'];?>" name="btn_id" >
                             <input type="submit" class="btn btn-danger" name="reply" data-dismiss="modal" value="Fuck that Quote">
                         </form>
                     </div>
                 </div>
             </div>
         </div>

      <!-- cards -->
      <?php
      if(isset($_POST['SearchVAR'])){
          searchRecord($dbc);
      }else{
        #run the query to show all quote records
        $query = "defualt";
        show_quote_records($dbc, $query);
      }

      if(isset($_POST['reply'])){
          $id = $_POST['btn_id'];
          delete_quote_record($id, $dbc);
      }

      # Close database connection
      mysqli_close($dbc);

       ?>
    </div>

    <div class="container">
      <footer id="footer">
          <div class="row">
            <div class="col-lg-12">
              <ul class="list-unstyled">
                <li class="float-lg-right"><a href="#top">Back to top</a></li>
                <li><a href="https://github.com/thomaspark/bootswatch/">GitHub</a></li>
              </ul>
              <p>Made by <a href="dgisolfi.php">Daniel Gisolfi</a>.</p>
              <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/master/LICENSE">MIT License</a>.</p>
            </div>
          </div>
        </footer>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
  </body>
</html>

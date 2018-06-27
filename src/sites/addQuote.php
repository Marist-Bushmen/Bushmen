<!DOCTYPE html>
<html lang="en">
<?php
//Show all error messages
ini_set('display_errors', true);
error_reporting(E_ALL);

//require files for connection to database, inputing records into db
// and displaying the records on the page
require('../scripts/connect_db.php');
require('../scripts/inputRecord.php');
require('../scripts/showRecord.php');
require('../scripts/deleteRecord.php');
require('../scripts/search_db.php');

// if($_SERVER['REQUEST_METHOD'] == 'POST') {
// 	if(isset($_POST['btnDelete'])) {
// 		$id = $_POST['submit_btn_id'];
// 		delete_quote_record($id, $dbc);
// 	}
// }
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bushmen - Quotes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/cyborg/bootstrap.min.css" >
  </head>
  <body>

    <!-- navbar -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="bushmen.php">Bushmen</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="bushmen.php">Quotes</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="addQuote.php">Add Quote</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li> -->
    </ul>

    </div>
  </nav>

    <div class="jumbotron jumbotron-fluid text-white bg-dark text-center">
        <div class="container" style="height="10%"">
          <h1>Add Quote</h1>
          <p>Add a new quote to the list! All existing quotes can be found on the home page. Context is not required all however other fields are. Make sure the date is in YYYY-MM-DD format, and don't include the time.</p>
        </div>
    </div>

    <div class="modal fade" id="cfrmQuote">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h2 class="modal-title">Quote Added!</h2>
                     <button type="button" class="close bg-dark" data-dismiss="modal">
                         <span>&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p>The Quote entered can be found on the main page, please visit the QUotes page to see the updated list</p>
                 </div>
                 <div class="modal-footer">
                     <form method="POST">
                         <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Thanks!">
                     </form>
                 </div>
             </div>
         </div>
     </div>


    <?php
      if(isset($_POST['addQuote'])){
        insert_quote_record($dbc);
        echo '<script type="text/javascript"> $("#cfrmQuote").modal("show"); </script>';
       }

     ?>

    <div class="container text-muted w-75">
      <div class="card mb-3">
        <h3 class="card-header text-light">Add Record</h3>
        <div class="card-body">
        <div id="entryform" class="content-wrap">
            <!-- <p class="card-text">Add a new quote to the list! All existing quotes can be found on the home page. Context is not required all however other fields are. Make sure the date is in YYYY-MM-DD format, and don't include the time.</p> -->
            <form method="POST">
              <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label text-light">Name</label>
                <div class="col-sm-10">
                  <input class="form-control" id="text" name="author" value="<?php if(isset($_POST['author'])) echo $_POST['author'];?>" placeholder="John Doe" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="quote" class="col-sm-2 col-form-label text-light">Quote</label>
                <div class="col-sm-10">
                  <input class="form-control" id="text" name="quote" value="<?php if(isset($_POST['quote'])) echo $_POST['quote'];?>" placeholder="Our God is an awesome God" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label text-light">Context</label>
                <div class="col-sm-10">
                  <input class="form-control" id="text" name="q_descr" value="<?php if(isset($_POST['q_descr'])) echo $_POST['q_descr'];?>" placeholder="While Drunk of Mead">
                </div>
              </div>

              <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label text-light">Date</label>
                <div class="col-sm-10">
                  <input class="form-control" name="q_date" type="date" value="<?php if(isset($_POST['q_date'])) echo $_POST['q_date'];?>" required>
                </div>
              </div>
                 <input type="submit" class="btn btn-light btn-lg btn-block" name="addQuote" value="Add Quote">
             </form>
         </div>
      </div>
  </div>

    <div class="container">
      <footer id="footer">
          <div class="row">
            <div class="col-lg-12">
              <ul class="list-unstyled">
                <li class="float-lg-right"><a href="#top">Back to top</a></li>
                <li><a href="https://github.com/Marist-Bushmen/Bushmen">GitHub</a></li>
              </ul>
              <p>Made by <a href="http://www.dgisolfi.xyz">Daniel Gisolfi</a>.</p>
              <p>Code released under the <a href="https://github.com/Marist-Bushmen/Bushmen/blob/master/LICENSE">Apache License</a>.</p>
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

<!--ShowRecords.php
Function to display all quotes
Author: Daniel Gisolfi
Version 1.0 -->
<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
require('../scripts/helperFunctions.php');

# Shows quotes records
function show_quote_records($dbc, $query) {
  if ($query == "defualt"){
    $query = "SELECT * FROM quotes ORDER BY q_id DESC";
  }

	# Execute the query
	$results = mysqli_query($dbc, $query);
	check_results($results);
  $qCount = 1;

	# Show results
	if($results){
  		# Generate a table row for each row result
  		while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        if($qCount == 1){

          echo '<div class="row">';
          echo '    <div class="col-md-4 col-lg-4"  style="padding-bottom:15px;">';
          echo '        <div class="card">';
          echo '            <div class="card-header text-white bg-primary text-center pull-left">' . $row['author'].'</div>';
          echo '                <div class="card-body text-center">';
          echo '                  <div class="card-body">';
          echo '                    <form method="POST">';
          echo '                      <div style="position:absolute; top:60px; right:10px;" ><input type="button" class="btn btn-outline-danger pull-right" data-toggle="modal" data-target="#cfrmDel" value="×"></div>';
          echo '                      <input type=hidden value='. $row['q_id'] .' name=submit_btn_id >';
          echo '                    </form>';
          echo '                    <h5 class="card-title">' . $row['quote'] . '<h3>';
                                    if(!($row['q_descr'] == "n/a")){
          echo '                      <h5 class="card-title">' . $row['q_descr'] . '<h3>';
                            		    }
          echo '                    </div>';
          echo '                  </div>';
          echo '                <div class="card-footer bg-Secondary text-center">';
          echo '                  <h5 class="card-title">' . $row['q_date'] . '<h3>';
          echo '                </div>';
          echo '            </div>';
          echo '        </div>';
          echo '<br>';
          $qCount++;


        } else if($qCount == 2){
            echo '    <div class="col-md-4 col-lg-4" style="padding-bottom:15px;">';
            echo '        <div class="card">';
            echo '            <div class="card-header text-white bg-primary text-center">' . $row['author'] . '</div>';
            echo '                <div class="card-body text-center">';
            echo '                  <div class="card-body">';
            echo '                    <form method="POST">';
            echo '                      <div style="position:absolute; top:60px; right:10px;" ><input type="button" class="btn btn-outline-danger pull-right" data-toggle="modal" data-target="#cfrmDel" value="×"></div>';
            echo '                      <input type=hidden value='. $row['q_id'] .' name=submit_btn_id >';
            echo '                    </form>';
            echo '                    <h5 class="card-title">' . $row['quote'] . '<h3>';
                                      if(!($row['q_descr'] == "n/a")){
            echo '                      <h5 class="card-title">' . $row['q_descr'] . '<h3>';
                              		    }
            echo '                    </div>';
            echo '                  </div>';
            echo '                <div class="card-footer bg-Secondary text-center">';
            echo '                  <h5 class="card-title">' . $row['q_date'] . '<h3>';
            echo '                </div>';
            echo '           </div>';
            echo '     </div>';
            echo '<br>';
            $qCount++;


        }else if($qCount == 3){
            $qCount = 0;
            echo '    <div class="col-md-4 col-lg-4" style="padding-bottom:15px;">';
            echo '        <div class="card">';
            echo '            <div class="card-header text-white bg-primary text-center">' . $row['author'] . '</div>';
            echo '                <div class="card-body text-center">';
            echo '                  <div class="card-body">';
            echo '                    <form method="POST">';
            echo '                      <div style="position:absolute; top:60px; right:10px;" ><input type="button" class="btn btn-outline-danger pull-right" data-toggle="modal" data-target="#cfrmDel" value="×"></div>';
            echo '                      <input type=hidden value='. $row['q_id'] .' name=submit_btn_id >';
            echo '                    </form>';
            echo '                    <h5 class="card-title">' . $row['quote'] . '<h3>';
                                      if(!($row['q_descr'] == "n/a")){
            echo '                      <h5 class="card-title">' . $row['q_descr'] . '<h3>';
                              		    }
            echo '                    </div>';
            echo '                  </div>';
            echo '                <div class="card-footer bg-Secondary text-center">';
            echo '                  <h5 class="card-title">' . $row['q_date'] . '<h3>';
            echo '                </div>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            // echo '<br>';
            $qCount++;
        }

		}

	}else{
    echo 'No records exist with the given critera';
  }

  'No records exist with the given critera';
  		# Free up the results in memory
  		mysqli_free_result($results);
}

?>

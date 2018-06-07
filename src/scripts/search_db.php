<!--searchRecord.php
Functions for searching records
Authors:  Daniel Gisolfi
Version 1.0 -->

<?php
require('connect_db.php');

function randQuote($dbc){
    $count = 0;
    $query = "SELECT * FROM Quotes order by RAND() LIMIT 1";
    $results = mysqli_query($dbc, $query);
    check_results($result);
    # Show results
    if($results){

        # Generate a table row for each row result
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {

        echo '<li>';
        echo '<div class="card">';
        echo '<div class="card-content">';
        echo '<form method="POST">';
        echo '<div id="btn-wrapper"><input type="submit" class="delete" name="btnDelete" value="×"></div>';
        echo '<input type=hidden value='. $row['q_id'] .' name=submit_btn_id >';
        echo '</form>';
        echo '<h2 class="card-author">' . $row['author'] . '</h2>';
        echo '<p>' . $row['quote'] . '<p>';
        if(!($row['q_descr'] == "n/a")){
            echo '<p>' . $row['q_descr'] . '<p>';
        }
        echo '<p>' . $row['q_date'] . '</p>';

        echo '	</div>';
        echo ' </div>';
        echo '</li>';

        }

    }
    # Free up the results in memory
    mysqli_free_result($results);
}

function searchRecord($dbc){
  $search_term = $_POST['SearchVAR'];

  $query = "SELECT * FROM quotes WHERE author LIKE '%".$search_term."%' OR quote LIKE '%".$search_term."%' OR q_date LIKE '%".$search_term."%' OR q_descr LIKE '%".$search_term."%';";
  show_quote_records($dbc, $query);

}

<!--helperFunctions.php
result checking and any additional needed functions
Authors:  Daniel Gisolfi
Version 1.0 -->

<?php
require('../scripts/connect_db.php');

#Return an SQL error to the site if one exits
function check_results($results) {
  global $dbc;
  if($results != true){
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
  }
  return true ;
}


function console_log( $data ){
  echo '<script>';
  echo 'console.log('. $data .')';
  echo '</script>';
}

?>

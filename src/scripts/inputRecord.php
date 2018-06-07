<!--inputRecord.php
Input functions used to allow for new records
Authors:  Daniel Gisolfi
Version 1.0 -->

<?php

require('connect_db.php');

# Inserts new quote record into the database
function insert_quote_record($dbc) {
	$author = $_POST['author'];
	$quote =  $_POST['quote'];
	$q_date = $_POST['q_date'];
	$q_descr = $_POST['q_descr'];

	if($q_descr == null){
		$q_descr = "n/a";

	$devilChar = "'";

	//remove all occurences of: '
	$search = strpos($quote, $devilChar);

	if ($search > 0){
		$str = str_replace("'", "`", $quote);
		$quote = $str;
	}
}

	$query = "INSERT INTO quotes(author, quote, q_date, q_descr) VALUES('" . $author . "','" . $quote . "','" . $q_date . "','" . $q_descr . "')";
	$result = mysqli_query($dbc, $query);
	check_results($result);

	//reset all vals to reset for new input
	$_POST['author'] = null;
	$_POST['quote'] = null;
	$_POST['q_date'] = null;
	$_POST['q_descr'] = null;

  // alert('Quote has been added to the Database');
  echo '';
	// backupData($dbc);
}


function backupData($dbc){
	// the message
	$records = array();
	$msg = "";

	$query = "SELECT * FROM quotes ORDER BY q_id DESC";

	# Execute the query
	$results = mysqli_query($dbc, $query);
	check_results($results);

	# Show results
	if($results){
		while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	    $records += $row;
		}
	}

	// use wordwrap() if lines are longer than 70 characters
	$msg = wordwrap($msg,70);

	// send email
	mail("dgisolfiad@gmail.com","Backup",$msg);

}


function alert($msg){

  echo '<div class="modal">';
  echo '<div class="modal-dialog" role="document">';
  echo '<div class="modal-content">';
  echo '<div class="modal-header">';
  echo '<h5 class="modal-title">Alert</h5>';
  echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
  echo '<span aria-hidden="true">&times;</span>';
  echo '</button>';
  echo '</div>';
  echo '<div class="modal-body">';
  echo '  <p>'. $msg .'</p>';
  echo '</div>';
  echo '<div class="modal-footer">';
  echo '<button type="button" class="btn btn-primary">Save changes</button>';
  echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';

}


?>

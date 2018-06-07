<!--deleteRecord.php
Input functions used to allow for new records
Authors:  Daniel Gisolfi
Version 1.0 -->

<?php
require('connect_db.php');

function delete_quote_record($q_id, $dbc){

    if (confirmDel() == true){
        $query = "DELETE FROM quotes WHERE q_id = '" . $q_id . "'";
        $result = mysqli_query($dbc, $query);
        check_results($result);
    }

}

function confirmDel(){








    $reply = $_POST['reply'];

    Return $reply;
}

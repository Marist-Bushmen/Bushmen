<!--connect_db.php
Create a Database Connection
Author: Daniel Gisolfi
Version 1.0 -->

<?php
# CONNECT TO MySQL DATABASE.

# Connect to the limbo database.

# Otherwise fail gracefully and explain the error.

$dbc = @mysqli_connect ( 'null', 'null', 'null', 'null' )


OR die ( mysqli_connect_error() ) ;


# Set encoding to match PHP script encoding.
mysqli_set_charset( $dbc, 'utf8' ) ;

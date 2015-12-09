<?php
//db.inc.php
/* By keeping your DB connection code in its own file you
    don't have to write it over and over... and if it changes
    you can change it in one spot to fix your whole site
*/
function ConnectToDB()
{

    //server, username, password, database name
    $mysqli = new mysqli('localhost', 'user', '1234', 'estimate');  
    // $mysqli = new mysqli('localhost', 'ixd2434_estimate', 'design1234', 'ixd2434_estimate');     
    if ($mysqli->connect_error != '') 
    {
      throw new Exception('Unable to connect to DB:'.$mysqli->connect_error);
    } else {
      // echo 'connection established';
      return ($mysqli);
    }
}

?>

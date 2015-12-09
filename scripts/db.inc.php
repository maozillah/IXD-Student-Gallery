<?php
function ConnectToDB()
{

    //server, username, password, database name
    $mysqli = new mysqli('localhost', 'user', '1234', 'ixd_gallery');  
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

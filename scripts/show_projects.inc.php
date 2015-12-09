<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

require('db.inc.php');

if (isset($_GET['q'])) {
    $q = $_GET['q'];
} 
else {
    $q = 'all';
}

echo $q;

// remove function to run
if ($q == 'all') {
    
    $db = ConnectToDB();
    
    $sql = "SELECT img_url FROM project";;
    
    $result = $db->query($sql);

    $directory = 'uploads/';
    
    if ($result->num_rows > 0) {
        
        // output data of each row
        while ($row = $result->fetch_assoc()) {
        echo '<img src="' .$directory . $row['img_url']. '" alt="">';
        }
    }

    $result->close();
    mysqli_close($db);
}

?>

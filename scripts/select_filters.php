<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

require ('db.inc.php');

// $userEmail = $_SESSION["userName"];

function getClasses() {
    
    $db = ConnectToDB();
     //this function is in db.inc.php
    
    $sql = "SELECT class_name FROM class ORDER BY class_year";
    
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='$scopeTitle'>".$row['class_name']."</option>";
        }
    }
    
    $result->close();
    mysqli_close($db);
}
?>

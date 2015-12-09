<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

require('db.inc.php');

// remove function to run
function insertProjects() {
    
    
    $db = ConnectToDB();
    
    $sql = "
SELECT type_id FROM type WHERE type_title ='$type'
UNION
SELECT scope_id FROM scope WHERE scope_title='$scope';
";
    
    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $scope_type[] = $row['type_id'];
        }
    }
    
    if ($result2->num_rows > 0) {
        
        // output data of each row
        while ($row = $result2->fetch_assoc()) {
            $id = $row['project_id'];
        }
    }

    $result->close();
    
    mysqli_close($db);
}

?>

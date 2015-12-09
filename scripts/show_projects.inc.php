<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

require ('db.inc.php');

if (isset($_GET['q'])) {
    $q = $_GET['q'];
} 
else {
    $q = 'all';
}

$directory = 'uploads/';
$db = ConnectToDB();

// remove function to run
if ($q == 'all') {
    $sql = "SELECT project.img_url, project.project_name, project.project_description
    FROM project
        JOIN class
            ON project.class_id = class.class_id";;
    $result = $db->query($sql);
} 
else {
    $sql = "SELECT project.img_url, project.project_name, project.project_description
    FROM project
        JOIN class
            ON project.class_id = class.class_id
WHERE class_year = '$q'";
    $result = $db->query($sql);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['project_name'];
         echo $row['project_description'];
        echo '<img src="' . $directory . $row['img_url'] . '" alt="">';
    }
}

$result->close();
mysqli_close($db);
?>

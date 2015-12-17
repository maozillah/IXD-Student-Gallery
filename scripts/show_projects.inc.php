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
    $sql = "SELECT project.img_url, project.project_name, project.project_description, project.project_id
    FROM project
        JOIN class
            ON project.class_id = class.class_id
        ORDER BY completion_date;";
    $result = $db->query($sql);
} 
else {
    $sql = "SELECT project.img_url, project.project_name, project.project_description, project.project_id
    FROM project
        JOIN class
            ON project.class_id = class.class_id
WHERE class_year = '$q'
ORDER BY completion_date;";
    $result = $db->query($sql);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '<h2><a href="project.php?project='.$row['project_id'].'">'.$row['project_name'].'</a></h2>';
         echo '<p>'.$row['project_description'].'</p>';
        echo '<img src="' . $directory . $row['img_url'] . '" alt="" class="fullwidth">';
        echo '</div>';
    }
} else {
    echo '<div class="col-md-12"><h2>No results found</h2></a>';
}

$result->close();
mysqli_close($db);
?>

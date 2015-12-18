<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

require ('db.inc.php');

if (isset($_POST['search'])) {
    $q = $_POST['search'];
}

// echo 'displaying'. $q;

$directory = 'uploads/';
$db = ConnectToDB();

$sql = "SELECT project_name, project_description, img_url, project_id FROM project WHERE project_name REGEXP '$q' OR project_description REGEXP '$q';";
$result = $db->query($sql);

$c = 0; // Our counter
$n = 3;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        if ($c == 0) {
             echo '<div class="row">';
        }

           if($c % $n == 0 && $c != 0) 
      {
        // New table row
        echo '</div><div class="row">';
      } 
    $c++;
        echo '<div class="col-md-4">';
        echo '<h2><a href="project.php?project='.$row['project_id'].'">'.$row['project_name'].'</a></h2>';
         echo '<p>'.$row['project_description'].'</p>';
        echo '<div class="thumbnail"><img src="' . $directory . $row['img_url'] . '" alt="" class="img-responsive"></div>';
        echo '</div>';
    }

    // implement search through team members
} else {
    echo '<div class="col-md-12"><h2>No results found</h2></a>';
}

$result->close();
mysqli_close($db);

?>

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

$sql = "SELECT project_name, project_description, img_url FROM project WHERE project_name OR project_description REGEXP '$q';";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['project_name'];
        echo $row['project_description'];
        echo '<img src="' . $directory . $row['img_url'] . '" alt="">';
    }

    // implement search through team members
}

$result->close();
mysqli_close($db);

?>

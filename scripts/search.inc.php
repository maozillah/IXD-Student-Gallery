<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

require ('db.inc.php');

if (isset($_POST['search'])) {
    $q = $_POST['search'];
}

echo 'displaying'. $q;

// $directory = 'uploads/';
// $db = ConnectToDB();

// $sql = "SELECT project.img_url, project.project_name, project.project_description
//     FROM project
//         JOIN class
//             ON project.class_id = class.class_id
// 		WHERE class_name = '$q'
// 		ORDER BY completion_date;";
// $result = $db->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo $row['project_name'];
//         echo $row['project_description'];
//         echo '<img src="' . $directory . $row['img_url'] . '" alt="">';
//     }
// }

// $result->close();
// mysqli_close($db);
?>

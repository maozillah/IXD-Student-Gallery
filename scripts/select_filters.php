<?php
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
    require ('db.inc.php');

    function getClasses() {

        $db = ConnectToDB();

        $sql = "SELECT class_name FROM class ORDER BY class_year";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row['class_name']."'>".$row['class_name']."</option>";
            }
        }

        $result->close();
        mysqli_close($db);
    }

    function getClassesID() {

        $db = ConnectToDB();

        $sql = "SELECT * FROM class";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row['class_id']."'>".$row['class_name']."</option>";
            }
        }

        $result->close();
        mysqli_close($db);
    }
?>
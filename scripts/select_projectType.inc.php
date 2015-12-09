<?php 
ini_set('display_errors', '1');
error_reporting(E_ALL); 

require('db.inc.php');

// $userEmail = $_SESSION["userName"];

function GetYear()
{
    global $userEmail;
    
    $mysqli = ConnectToDB(); //this function is in db.inc.php
       
    $sql = "SELECT project.project_name, project.img_url, class.class_year, class.class_name
    FROM project
        JOIN class
            ON project.class_id = class.class_id
        WHERE class_year = '3'" ;
} 

?>

<?php
    require ('header.php');
    require("scripts/db.inc.php");
    
    $project_id;
    $class_name;
    $class_year;
    $team_id;
    $project_name;
    $project_description;
    $completion_date;
    $img_url;
    $project_url;
    

    //Do something about this pls
    if( isset($_GET["project"]) ){
        $project_id = $_GET['project'];
    } else {
        $project_id;
    }
    
    $db = ConnectToDB();

    $result = $db->query("SELECT class.class_name, class.class_year, project.team_id, project.project_name, project.project_description, project.completion_date, project.img_url, project.project_url FROM project JOIN class ON project.class_id = class.class_id WHERE project.project_id = ".$_GET['project']." LIMIT 1");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $class_name = $row['class_name'];
            $class_year = $row['class_year'];;
            $team_id = $row['team_id'];
            $project_name = $row['project_name'];
            $project_description = $row['project_description'];
            $completion_date = $row['completion_date'];
            $img_url = $row['img_url'];
            $project_url = $row['project_url'];
        }
    }

?>

 <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="show_gallery.php">IxD Gallery</a>
        </div>
       <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a class="btn btn-primary" href="signup.php" role="button">Sign up &raquo;</a>
        
                <a class="btn btn-primary" href="project_upload.php" role="button">Upload &raquo;</a>
        </div>
    </nav>
     
    <div class="jumbotron banner" style="<?php echo "background-image:url(uploads/".$img_url.");" ?>"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 box">
                <?php
                    echo "<h1>".$project_name."</h1>";

                    $result2 = $db->query("SELECT users.user_email, users.first_name, users.last_name, users.blog_url FROM teamuser JOIN users ON teamuser.user_email = users.user_email WHERE team_id = $team_id");
                    if ($result2->num_rows > 0) {
                        echo "<p style='margin:0; text-decoration: underline;'>Authors</p>";
                        while ($row = $result2->fetch_assoc()) {
                            echo "<a href='http://".$row['blog_url']."'>".$row['first_name']. "</a><br>";
                        }
                    }
                    
                    echo
                    "
                    <br>
                    <p>".$completion_date."</p>
                    <p>".$project_description."</p>
                    ";
                ?>
            </div>

            
            <div class="col-md-4 box">
                <?php
                    echo 
                    "
                    <h2>".$class_name."</h2>
                    <p>Year ".$class_year."</p>
                    <a class='btn btn-primary' role='button' href='".$project_url."'>View Project Blog &raquo;</a>
                    ";
                ?>
            </div>
        </div>
     
<?php require ('footer.php'); ?>
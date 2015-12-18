<?php
    require("scripts/select_filters.php");
    require('header.php');
?>
     
    <div class="container" style="margin-top:20px;">
        <form class="form-horizontal" role="form" action="upload.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-sm-offset-2 control-label col-sm-2" for="email">Project Name:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="title">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-offset-2 control-label col-sm-2" for="team1">Team Members:</label>
                <div id="teamMembers" class="col-sm-4">
                    <input type="text" class="form-control" name="team1">
                </div>
                <p class="col-sm-2" id="addMember" style="color:#999999; cursor:pointer;" onclick="addMember();">Add more members</p>
            </div>

            <div class="form-group">
                <label class="col-sm-offset-2 control-label col-sm-2" for="date">Date of Completion:</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="date">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-offset-2 control-label col-sm-2" for="blog">Blog Post URL:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="blog">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-offset-2 control-label col-sm-2" for="sel1">Class:</label>
                <div class="col-sm-4">
                    <select class="form-control" name="class" id="sel1">
                        <?php getClassesID(); ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-offset-2 control-label col-sm-2" for="blog">Project Description:</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="description" rows="5"></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-offset-2 control-label col-sm-2" for="projectImage">Project Image:</label>
                <div class="col-sm-4">
                    <input type="file" name="fileToUpload">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                    <button type="submit" class="btn btn-default">Upload Project</button>
                </div>
            </div>

        </form>
        
        
        <script>
            var teamMembers = 1;

            function addMember(){
                if(teamMembers < 5){
                    teamMembers++;
                    document.getElementById('teamMembers').innerHTML += "<br><input class='form-control' name='team" + teamMembers + "' type='text'></span>\r\n";
                }
            }
        </script>
        
<?php require ('footer.php'); ?>
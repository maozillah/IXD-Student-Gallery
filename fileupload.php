<?php
    require("scripts/select_filters.php");
?>
<html>
    <style>
        label, input, textarea {
            display: block;
        }

        label {
            margin-bottom: 30px;
        }
        
        #addMember {
            margin-bottom: 30px;
            color: firebrick;
            cursor: pointer;
        }
        
        #teamMembers{
            margin-bottom: 0;
        }
        
        #teamMembers input{
            margin-bottom: 5px;
        }
    </style>
<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Project Name: 
        <input id="title" type="text" name="title">
        </label>

        <label id="teamMembers">Team Members: 
        <input id="team1" type="text" name="team1">
        </label>
        <p id="addMember" onclick="addMember();">Add more members</p>
        
        <label>Date of Completion:
        <input id="date" type="date" name="date">
        </label>

        <label>Blog Post URL: 
        <input id="blog" type="text" name="blog">
        </label>

        <label>Class: 
            <select>
                <?php getClassesID(); ?>
            </select>
        </label>
        
        <label>Project Description:
        <textarea id="description" name="description" cols="40" rows="5"></textarea>
        </label>

        <label>Select image to upload: 
        <input type="file" name="fileToUpload" id="fileToUpload">
        </label>

        <input type="submit" value="Upload Image" name="submit">
    </form>


    <script>
        var teamMembers = 1;
        
        function addMember(){
            if(teamMembers < 5){
                teamMembers++;
                document.getElementById('teamMembers').innerHTML += "<input name='team" + teamMembers + "' type='text'></span>\r\n";
            }
        }
        
    </script>
</body>
</html>
<?php
    require("scripts/db.inc.php");

    $error = "";

    if(isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["blog"])){
        $db = ConnectToDB();
        
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $blog = $_POST['blog'];
        
        try {
            $db->begin_transaction();
            
            $result = $db->query("SELECT * FROM users WHERE user_email = '$email';");
            
            if($result->num_rows > 0){
                $error = "You already exist wat r u doin";
            }
            
            if(!isset($error)){
                $db->query("INSERT INTO users VALUES ( '$email', '$pass', '$firstName', '$lastName', '$blog' );");
            }
            
            $db->commit();
            
            mysqli_close($db);
            
            if(!isset($error)){
                header("Location: show_gallery.php");
            }
        }
        catch(Exception $e) {
            $db->rollback();
        }
        
    } else if(isset($_POST["email"]) || isset($_POST["pass"]) || isset($_POST["firstName"]) || isset($_POST["lastName"]) || isset($_POST["blog"])){
        $error = "Something's missing yo";
    }
    
    require ('header.php');
?>
     
    <div class="container" style="margin-top:20px;">
            <form class="form-horizontal" role="form" action="signup.php" method="post">
                
                <div class="form-group">
                    <label class="col-sm-offset-2 control-label col-sm-2" for="email">Email address:</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-offset-2 control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="pass">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-offset-2 control-label col-sm-2" for="fname">First Name:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="firstName">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-offset-2 control-label col-sm-2" for="lname">Last Name:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="lastName">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-offset-2 control-label col-sm-2" for="blog">Blog URL:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="blog">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign Up</button>
                    </div>
                </div>
                
                <p class="col-sm-offset-4" id="error" style="color:red;"> <?php echo $error; ?>
                  
            </form>
     
<?php require ('footer.php'); ?>
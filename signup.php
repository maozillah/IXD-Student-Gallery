<?php
    require("scripts/db.inc.php");

    $error;

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
                header("Location: fileupload.php");
            }
        }
        catch(Exception $e) {
            $db->rollback();
        }
        
    } else if(isset($_POST["email"]) || isset($_POST["pass"]) || isset($_POST["firstName"]) || isset($_POST["lastName"]) || isset($_POST["blog"])){
        $error = "Something's missing yo";
    }

?>

<html>
    <style>
        label, input, textarea {
            display: block;
        }

        label {
            margin-bottom: 30px;
        }
    </style>
<body>
    
    <form action="signup.php" method="post">
        <label>Email: 
            <input id="email" type="text" name="email">
            <p id="emailError"></p>
        </label>
        
        <label>Password: 
            <input id="pass" type="password" name="pass">
            <p id="passError"></p>
        </label>
        
        <label>First Name: 
            <input id="firstName" type="text" name="firstName">
            <p id="firstNameError"></p>
        </label>
        
        <label>Last Name: 
            <input id="lastName" type="text" name="lastName">
            <p id="lastNameError"></p>
        </label>
        
        <label>Blog URL: 
            <input id="blog" type="text" name="blog">
            <p id="blogError"></p>
        </label>
        
        <input type="submit" value="Sign Up" name="submit">
        <p id="error" style="color:red;"> <?php echo $error; ?> </p>
    </form>


    <script>
        
    </script>
</body>
</html>
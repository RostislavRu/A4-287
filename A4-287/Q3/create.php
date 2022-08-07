<?php 
    require_once 'functions.inc.php';
    session_start();

    if(isset($_POST["submit"])){  
        $username = $_POST["user"];
        $password = $_POST["pass"];

        createUser($username, $password);
    } 
?>

<!DOCTYPE html>
<html  lang="en">
    <head>
        <title>Create User</title>
        <link rel="stylesheet" type="text/css" href="Q5.css">
        <script type="text/javascript" src='Q5.js?version=<?= time() ?>'></script>
    </head>
    <?php include 'Header.php';?>
    <body>
        <ul class="ml">
            <li><a href="Home.php">Home Page</a></li>
            <li><a href="create.php" class="active">Create Account</a></li>
            <li><a href="log.php">Login</a></li>
            <li><a href="FindPet.php">Find a dog/cat</a></li>
            <li><a href="DogCare.php">Dog Care</a></li>
            <li><a href="CatCare.php">Cat Care</a></li>
            <li><a href="Give.php">Have a pet to give away?</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
        </ul>
        <div class="content">
            <h1>Create an account</h1>
            <form action="create.php" method="post" id="formCreate">
                Username (Letters and digits only): <input type="text" name="user"><br>
                Password (Min 4 characters, at least one letter and one digit): <input type="password" name="pass"><br>
                <input type="submit" value="Create Account" name="submit" onclick="return validateFormCreate()">
            </form> 
        </div>    
    </body>
    <?php include 'Footer.php';?>
</html>  
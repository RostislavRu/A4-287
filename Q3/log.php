<?php 
    require_once 'functions.inc.php';
    session_start();

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $pwd = $_POST["password"];
    
        loginUser($username, $pwd); 
    }

    if(isset($_POST["logout"])){
        session_unset();
        session_destroy();
        echo "<script type='text/javascript'>alert('You have successfully logged out');</script>";
      }

    if(!isset($_SESSION['logged'])){
        echo '<!DOCTYPE html>
        <html  lang="en">
            <head>
                <title>Login</title>
                <link rel="stylesheet" type="text/css" href="Q5.css">
                <script type="text/javascript" src="Q5.js"></script>
            </head>';

            include "Header.php";

            echo '<body>
                <ul class="ml">
                    <li><a href="Home.php">Home Page</a></li>
                    <li><a href="create.php">Create Account</a></li>
                    <li><a href="log.php" class="active">Login</a></li>
                    <li><a href="FindPet.php">Find a dog/cat</a></li>
                    <li><a href="DogCare.php">Dog Care</a></li>
                    <li><a href="CatCare.php">Cat Care</a></li>
                    <li><a href="Give.php">Have a pet to give away?</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                </ul>
                <div class="content">
                    <form action="#" method="post">
                        <input type="username" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input value="Login" type="submit" name="login">
                    </form>
                </div>
            </body>';

            include "Footer.php";

        echo '</html> ';
    }else{
        echo '<!DOCTYPE html>
        <html  lang="en">
            <head>
                <title>Login</title>
                <link rel="stylesheet" type="text/css" href="Q5.css">
                <script type="text/javascript" src="Q5.js"></script>
            </head>';

            include "Header.php";

            echo '<body>
                <ul class="ml">
                    <li><a href="Home.php">Home Page</a></li>
                    <li><a href="create.php">Create Account</a></li>
                    <li><a href="log.php" class="active">Login</a></li>
                    <li><a href="FindPet.php">Find a dog/cat</a></li>
                    <li><a href="DogCare.php">Dog Care</a></li>
                    <li><a href="CatCare.php">Cat Care</a></li>
                    <li><a href="Give.php">Have a pet to give away?</a></li>
                    <li><a href="Contact.php">Contact Us</a></li>
                </ul>
                <div class="content">
                    <form action="#" method="post">
                        <input value="Logout" type="submit" name="logout">
                    </form>
                </div>
            </body>';

            include "Footer.php";

        echo '</html> ';
    }
?>

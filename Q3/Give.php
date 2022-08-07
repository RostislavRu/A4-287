<?php
    session_start();

    if(!isset($_SESSION['logged'])){
        echo "<script type='text/javascript'>alert('Please login to view this page');</script>";
        echo "<script>window.location = 'log.php';</script>";
    }

    if(isset($_POST["submit"])){
        $type = $_POST['typeR'];
        $breed = $_POST['breedField'];
        $breed = strtolower($breed);
        $mixed = $_POST['mixed'];
        $age = $_POST['ageField'];
        $gender = $_POST['gender'];
        $along = $_POST['along'];

        if($along != ''){
            $alongstr = implode(", ", $along);
        }

        $details = $_POST['textgive'];
        $user = $_SESSION['user'];

        $id = file_get_contents('id.txt');

        $entry = $id.':'.$user.':'.$type.':'.$mixed.':'.$age.':'.$breed.':'.$gender.':'.$alongstr.':'.$details."\n";
        $id += 1;
        file_put_contents('id.txt', $id);

        $file = fopen('availablePets.txt', 'a+') or die("Can't open file");
        fwrite($file, $entry);
        fclose($file);
        header("location: Give.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Give Away Pet</title>
        <link rel="stylesheet" type="text/css" href="Q5.css">
        <script type="text/javascript" src="Q5.js"></script>
    </head>
    <?php include 'Header.php'; ?>
    <body>
        <ul class="ml">
            <li><a href="Home.php">Home Page</a></li>
            <li><a href="create.php">Create Account</a></li>
            <li><a href="log.php">Login</a></li>
            <li><a href="FindPet.php">Find a dog/cat</a></li>
            <li><a href="DogCare.php">Dog Care</a></li>
            <li><a href="CatCare.php">Cat Care</a></li>
            <li><a href="Give.php" class="active">Have a pet to give away?</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
        </ul>
        <div class="content">
            <h2>Give Up an Animal for Adoption</h2>
            <form action="Give.php" id="formGive" onsubmit="return validateFormGive()" method="post">
                <div class="insideContent">
                    <label>Is it a dog or a cat?</label>
                    <input id="type1" type="radio" name="typeR" value=dog/> Dog <input id="type2" type="radio" name="typeR" value=cat/> Cat<br/>
                </div>
                <div class="insideContent">
                    <label>What breed is the animal?</label> <input id="breedtxt" type="text" name="breedField" size="25"> Mixed Breed? <input id="mixedCB" type="checkbox" name="mixed" value="mixed">
                </div>
                <div class="insideContent">
                    <label>Age of Animal: </label> <input id="aniAge" type="text" name="ageField" size="10">
                </div>
                <div class="insideContent">
                    <label>Gender:</label>
                    <input id="gender1" type="radio" name="gender" value=male/> Male <input id="gender2" type="radio" name="gender" value=female/> Female
                </div>
                <div class="insideContent">
                    <label>Other:</label> Gets along with dogs? <input id="giveAlongDog" type="checkbox" name="along[]" value="dogs"> Gets along with cats? <input id="giveAlongCat" type="checkbox" name="along[]" value="cats"> Suitable for family with small children? <input id="givesuitfam" type="checkbox" name="along[]" value="children">               
                </div>
                <div class="insideContent">
                    Tell us more about the animal:<br/> <textarea id="textgive" name="textgive" rows="4" cols="30"></textarea>
                </div>
                <div class="insideContent">
                    <label>Full Name:</label> <input id="namegive" type="text" name="namegive" size="25"><br/>
                    <label>Email:</label> <input type="email" id="emailgive" name="emailgive">
                </div>
                <input type="submit" name="submit">
                <input type="reset">
            </form>
        </div>
    </body>
    <?php include 'Footer.php'; ?>
</html>

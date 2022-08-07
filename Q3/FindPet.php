<?php
    session_start();

    function matchPets($type, $breed, $age, $gender, $along){
        $file = fopen('availablePets.txt', 'r') or die("Can't open file");
        echo '<div class="grid-container">';

        while(!feof($file)){
            $line = fgets($file);
            $arrFile = explode(':', $line);
            $arrAge = explode('-', $age);

            if($type == $arrFile[2] && ($arrAge[0] <= $arrFile[4] && $arrFile[4] <= $arrAge[1]) && ($gender == "none/" || $gender == $arrFile[6])){
                if($along == '' || strpos($arrFile[7], $along) !== false){
                    if($breed == "none"){
                        echo '<div class="grid-item">'.$arrFile[4].' year old '.$arrFile[5].' '.str_replace('/', '', $arrFile[2]).', '.str_replace('/', '', $arrFile[6]).'.</br>Gets along with '.$arrFile[7].'.</br>Extra details: '.$arrFile[8].'</br><input type="button" value="Interested"></div>';
                    }else if(strpos($breed, $arrFile[5]) !== false){
                        echo '<div class="grid-item">'.$arrFile[4].' year old '.$arrFile[5].' '.str_replace('/', '', $arrFile[2]).', '.str_replace('/', '', $arrFile[6]).'.</br>Gets along with '.$arrFile[7].'.</br>Extra details: '.$arrFile[8].'</br><input type="button" value="Interested"></div>';
                    }
                }
            }
        }
        echo '</div>';
    }
?>
<!DOCTYPE html>
<html  lang="en"> 
    <head>
        <title>Find Pet</title>
        <link rel="stylesheet" type="text/css" href="Q5.css">
        <script type="text/javascript" src="Q5.js"></script>
    </head>
    <?php include 'Header.php'; ?>
    <body>
        <ul class="ml">
            <li><a href="Home.php">Home Page</a></li>
            <li><a href="create.php">Create Account</a></li>
            <li><a href="log.php">Login</a></li>
            <li><a href="FindPet.php" class="active">Find a dog/cat</a></li>
            <li><a href="DogCare.php">Dog Care</a></li>
            <li><a href="CatCare.php">Cat Care</a></li>
            <li><a href="Give.php">Have a pet to give away?</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
        </ul>
        <div class="content">
            <h2>Find a pet for adoption</h2>
            <form action="" id="formFind" onsubmit="return validateFormFind()" method="Post">
                <div class="insideContent">
                    <label>Are you looking for a dog or a cat?</label>
                    <input id="type1" type="radio" name="type" value=dog/> Dog <input id="type2" type="radio" name="type" value=cat/> Cat
                </div>
                <div class="insideContent">
                    <label>Looking for any specific breed(s)?: </label> <br/>
                    <table id="breedTable">
                    <tr>
                        <td>
                            <label>Dog breeds:</label> <input id="dogBreed1" type="checkbox" name="dogBreed[]" value="german"/>German Shephard <input id="dogBreed2" type="checkbox" name="dogBreed[]" value="poodle"/>Poodle<br/>
                            <input id="dogBreed3" type="checkbox" name="dogBreed[]" value="retriever"/>Golden Retreiver <input id="dogBreed4" type="checkbox" name="dogBreed[]" value="bulldog"/>Bulldog
                        </td>
                        <td>
                            <label>Cat breeds:</label> <input id="catBreed1" type="checkbox" name="catBreed[]" value="bengal"/>Bengal <input id="catBreed2" type="checkbox" name="catBreed[]" value="maine"/>Maine Coon<br/>
                            <input id="catBreed3" type="checkbox" name="catBreed[]" value="sic"/>Standard Issue Cat <input id="catBreed4" type="checkbox" name="catBreed[]" value="siamese"/>Siamese
                        </td>
                        <td><input id="noneBreed" type="checkbox" name="noneOption" value="none"/>Doesn't matter</td>
                    </tr>
                </table>
                </div>
                <div class="insideContent">
                    <label>
                        Preffered Age of Animal:
                        <select id="ageDropBox" name="agegroup">
                            <option value="0-5">Less than 5</option>
                            <option value="5-10">Between 5 and 10</option>
                            <option value="10-15">Between 10 and 15</option>
                            <option value="15-30">Older than 15</option>
                        </select>
                    </label>
                </div>
                <div class="insideContent">
                    <label>Preffered Gender:</label>
                    <input id="gender1" type="radio" name="gender" value=male/> Male <input id="gender2" type="radio" name="gender" value=female/> Female <input id="gender3" type="radio" name="gender" value=none/> Doesn't matter
                </div>
                <div class="insideContent">
                    <label>Who does it need to get along with?:</label>
                    <input id="GA1" type="checkbox" name="GA[]" value="dogs"/>Dogs <input id="GA2" type="checkbox" name="GA[]" value="cats"/>Cats
                    <input id="GA3" type="checkbox" name="GA[]" value="children"/>Small Children
                </div>
                <input type = "submit" name="submit" value = "Submit Order" /> <input type = "reset"  value = "Reset Form" />
            </form>
        </div>
            <?php
            if(isset($_POST["submit"])/* && isset($_POST["type"]) && isset($_POST["noneOption"]) && isset($_POST["dogBreed"]) && isset($_POST["catBreed"]) && isset($_POST["agegroup"]) && isset($_POST["gender"]) && isset($_POST["GA"])*/){
                $type = $_POST['type'];
        
                if($type == "dog/"){
                    if(!isset($_POST['noneOption'])){
                        $breed = $_POST['dogBreed'];
                        $breedstr = implode(", ", $breed);
                    }else{
                        $breedstr = "none";
                    }
                }else{
                    if(!isset($_POST['noneOption'])){
                        $breed = $_POST['catBreed'];
                        $breedstr = implode(", ", $breed);
                    }else{
                        $breedstr = "none";
                    }
                }
        
                $age = $_POST['agegroup'];
                $gender = $_POST['gender'];
                if(isset($_POST['GA'])){
                    $alongstr = implode(", ", $_POST['GA']);
                }else{
                    $alongstr = '';
                }

                matchPets($type, $breedstr, $age, $gender, $alongstr);
            }
            ?>
    </body>
    <?php include 'Footer.php'; ?>
</html>

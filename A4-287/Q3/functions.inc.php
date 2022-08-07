<?php 
    function createUser($user, $pass){
        $file = "login.txt";
        $entry = $user.":".$pass."\n";
        $fileHandle = fopen($file, 'a+') or die("Can't open file");

        if(strpos(file_get_contents($file), $user) !== false) {
            fclose($fileHandle);
            echo "<script type='text/javascript'>alert('Username already exists, try again!');</script>";
            echo "<script>window.location = 'create.php';</script>";
        }else{
            fwrite($fileHandle, $entry);
            fclose($fileHandle);
            echo "<script type='text/javascript'>alert('Username created successfully');</script>";
            header("location: Login.php");
        }
    }

    function loginUser($user, $pass){
        $file = fopen('login.txt', 'r') or die("Can't open file");

        while(!feof($file)){
            $username="";
            $password="";
            $line = fgets($file);
            list($username, $password) = explode(':', $line);
            if(trim($username) == $user && trim($password) == $pass){
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['logged'] = 'yes';
            
                header("location: Give.php?userLog=".$_SESSION['user']."&".$_SESSION['logged']);
                break;
            }   
        }
        fclose($file);
    }

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
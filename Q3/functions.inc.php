<?php 
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
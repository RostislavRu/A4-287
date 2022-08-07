<?php
function uppercaseFirstandLast($word){
    $word = ucfirst($word);
    return $word;
}

function uclast($str) {
    return strrev(ucfirst(strrev($str)));//reverse string, use ucfirst on "first char" then reverse again"
}


?>
<!DOCTYPE html>
<html> 
  <head> 
    <title>PHP Code to Count Number of Visitors Using Cookies: PHPCODER</title> 
 </head> 
<body> 
  <div>
    <form action="" method="post">
      <label><h1>Function A:<h1></label><input type="text" name="f1word" size=25>
      </br><input type="submit" name="f1">
    </form>
    <?php
    if(isset($_POST['f1'])){
      $input = $_POST['f1word'];
      $word = uppercaseFirstandLast($input);
      $word = uclast($word);
      echo $word;
    }
    ?>
  </div>
  </br>
  <div>
    <form action="" method="post">
      <label><h1>Function B:<h1></label><input type="text" name="txtInput" size=25>
      </br><input type="submit" name="f2">
    </form>
    <?php
    if(isset($_POST['f2'])){
      $array = array_map('intval', explode(',', $_POST['txtInput']));
      $average = array_sum($array)/count($array);
      echo '<h1>Avg:</h1>';
      echo $average;

      sort($array);
      if(count($array)%2 != 0){
        $length = count($array);
        $half = $length / 2;
        $median_index = (int) $half;
        $median = $array[$median_index];
        echo '<h1>Median:</h1>';
        echo $median;
      }else{
        $length = count($array);
        $second = $length / 2;
        $first = $second - 1;
        $first_half = $array[$first];
        $second_half = $array[$second];
        $median = ($first_half + $second_half) / 2;
        echo '<h1>Median:</h1>';
        echo $median;
      }
    }
    ?>
  </div>

</body>    
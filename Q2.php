<?php
session_start();
setcookie("lastVisit", date("Y-m-d H:i:s"),time()+60*60*24*365); 
if (!isset($_COOKIE['count'])) { 
  echo "Welcome! This is the first time you have viewed this page."; 
  $cookie = 1;
  setcookie("count", $cookie);
  //setcookie(“lastVisit”, date(“F j, Y, g:i a”),time()+60*60*24*365); 
}else{
  $cookie = ++$_COOKIE['count'];
  setcookie("count", $cookie); 
  $lastVisit = "<p>Your last visit was on ".$_COOKIE['lastVisit'];
  echo "You have viewed this page ".$_COOKIE['count']." times."; 
  echo $lastVisit;
}
?>
<html> 
  <head> 
    <title>PHP Code to Count Number of Visitors Using Cookies: PHPCODER</title> 
 </head> 
</html>

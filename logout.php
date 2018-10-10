<?php
//start session
session_start();
//remove cookie

setcookie(username,'',time()-1);

//remove session
session_destroy();
//redirect to login page
header('location:index.php');

?>
<?php 
setcookie ("loginId", "", time() - (60*60*24*7), '/birth-death-certificate/');
setcookie ("role", "", time() - (60*60*24*7), '/birth-death-certificate/');
setcookie ("project", "", time() - (60*60*24*7), '/birth-death-certificate/');
session_start();
if (session_destroy()) {
    header("Location:../index.php");
}
?>
<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
SESSION_unset();
session_destroy();
header('Location: login.php');
}

?>



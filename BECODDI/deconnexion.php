<?php
session_start();
$_SESSION = array();

session_destroy();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

header('Cache-control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
header('Location: ../index.php');
exit; 
?>

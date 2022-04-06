<?php 
// Delete session
session_start();
session_unset();
session_destroy();

// Delete cookie
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("Location: login.php");
exit;

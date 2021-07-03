<?php  
session_start();
session_unset();
session_destroy();

setcookie('id', '', time()-360);
setcookie('key', '', time()-360);

header("location: ../index.php");
exit();
?>
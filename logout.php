<?php
session_start();
session_destroy(); // ?? Session ???????
session_start();
$_SESSION["view"] = 1;
header( 'Location: index.php' ) ;


?>

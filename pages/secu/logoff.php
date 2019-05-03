<?php
include './start.php';
?>

<?php 
//setcookie('NVI', NULL, -1); 
session_start();
session_destroy();
session_unset();
session_start();

header('Location: ../../index.php');  
?>
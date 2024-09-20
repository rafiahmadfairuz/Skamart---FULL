<?php
session_start();
session_unset(); 
session_destroy(); 

session_start();
$_SESSION['flash_message'] = [
    'header' => 'Berhasil',
    'message' => 'Berhasil Logout'
];
header('Location:../LoginRegister/login.php');
exit();
?>

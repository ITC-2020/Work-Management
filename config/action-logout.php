<?php 
	//memulai session
	session_start();

    $_SESSION['nama'] = '';
    unset($_SESSION['nama']);
    session_unset();
    session_destroy();
    header("Location: ../view/login.php");
?>
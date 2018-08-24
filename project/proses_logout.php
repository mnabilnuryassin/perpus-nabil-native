<?php 

session_start();
$sesiku = $_SESSION['login'];

if (isset($sesiku)) {
	unset($sesiku);
	session_destroy();
	header('Location: login.php');
} else {
	header('Location: login.php');
}

 ?>
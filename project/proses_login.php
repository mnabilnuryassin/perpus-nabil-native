<?php
include('../config/config.php');
session_start();

$username = $_POST['username']; 
$password = $_POST['password']; 


$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$login_data  = $query->fetch_assoc(); 

if ($username == $login_data['username'] && $password == $login_data['password']) {
	$_SESSION['login'] = $username;

	$query_user_role = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	$login_admin = $query_user_role->fetch_assoc(); 

	switch ($login_admin['id_user_role']) {
		case $login_admin = 1:
			header('Location: ../admin/dashboard.html');
			break;
		case $login_admin = 2:
			header('Location: daftar_buku.php');
			break;
		case $login_admin = 3:
			header('Location: daftar_buku.php');
			break;
		
		default:
			header('Location: login.php');
			break;
	}
	
} else {
	header('Location: login.php');
}

?>
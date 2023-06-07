<?php 
	session_start();
	include "connect.php";

	$username	= $_POST['username'];
	$password	= $_POST['password'];

	$query	= mysqli_query($connect, "SELECT * FROM login WHERE BINARY username = '$username' && password = '$password'") or die (mysqli_error($connect));

	$cek	= mysqli_num_rows($query);

	if($cek > 0){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header("location:../admin.php");
	} else{
		header("location:../profile/login.php?pesan=Login Gagal");
	}
?>
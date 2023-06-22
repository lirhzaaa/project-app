<?php 
session_start();
 
include "config.php";
 
$email = $_POST['Email'];
$password = $_POST['Password'];
 
$data = mysqli_query($server,"SELECT * FROM user where Email='$email' and Password='$password'");
 
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$row = mysqli_fetch_assoc($data);
	$_SESSION['Username'] = $row['Username'];
	$_SESSION['Rayon'] = $row['Rayon'];
	$_SESSION['Rombel'] = $row['Rombel'];
	$_SESSION['Nis'] = $row['Nis'];
	$_SESSION['Email'] = $email;
	$_SESSION['status'] = "login";
	echo "<script>alert('Login berhasil!'); window.location.href = 'dashboard.php';</script>";
  echo "<script>window.location.href = 'dashboard.php';</script>";
}else{
	echo "<script>alert('Login gagal! Perhatikan Email & Password anda');</script>";
	echo "<script>window.location.href = 'index.php';</script>";
}
?>
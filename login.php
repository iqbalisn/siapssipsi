<?php
session_start();
include "include/koneksi.php";
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = mysqli_query($conn, "SELECT * FROM siswa WHERE username='$username' AND password='$password'");
	$sql2 = mysqli_query($conn, "SELECT * FROM guru WHERE username='$username' AND password='$password'");
	$sql3 = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
	$num = mysqli_num_rows($sql);
	$num2 = mysqli_num_rows($sql2);
	$num3 = mysqli_num_rows($sql3);
	if($num>0){
		$num1 = mysqli_fetch_array($sql);
		$_SESSION['nis'] = $num1['nis'];
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		echo "<script language='javascript'>alert('Login Berhasil')</script>";
		echo '<meta http-equiv="refresh" content="0; url=Siswa/index.php">';
	}elseif($num2>0){
		$num1 = mysqli_fetch_array($sql2);
		$_SESSION['nip'] = $num1['nip'];
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		echo "<script language='javascript'>alert('Login Berhasil')</script>";
		echo '<meta http-equiv="refresh" content="0; url=Guru/index.php">';
	}elseif($num3>0){
		$num1 = mysqli_fetch_array($sql3);
		$_SESSION['id_admin'] = $num1['id_admin'];
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		echo "<script language='javascript'>alert('Login Berhasil')</script>";
		echo '<meta http-equiv="refresh" content="0; url=Admin/index.php">';
	}
	else{
		echo "<script language='javascript'>alert('Login Gagal')</script>";
		echo '<meta http-equiv="refresh" content="0; url=login/login.php">';
	}
}
?>

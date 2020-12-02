<?php
include('koneksi.php');
	$p=isset($_GET['p']) ? $_GET['p'] : 'home';
	if($p=='home')include 'home.php';
	if($p=='pelanggan')include 'pelanggan.php';
	if($p=='kerusakan')include 'kerusakan.php';
	if($p=='pembayaran')include 'pembayaran.php';
	if($p=='montir')include 'montir.php';
	if($p=='user')include 'user.php';
	if($p=='login')include 'login.php';
	if($p=='logout')include 'logout.php';
	
?>
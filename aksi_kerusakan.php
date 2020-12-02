<?php
include('koneksi.php');
	if($_GET['aksi']=='hapus')
	{
		$hapus=mysql_query("DELETE FROM kerusakan WHERE id_kerusakan=$_GET[id_hapus]");
		if($hapus) header('location:index.php?p=kerusakan');
	}
	if($_GET['aksi']=='entri')
	{
			if(isset($_POST['kirim']))
					{
						$jm = $_POST['jenis'];
						$ket = $_POST['keterangan'];
						$sql=mysql_query("INSERT INTO kerusakan (jenis_diesel,keterangan) VALUES ('$jm','$ket')");
						
						if($sql)
						{
							header('location:index.php?p=kerusakan');
							echo "<script> alert('Komentar berhasil dikirim') </script>";
						}
					}
	}
	if($_GET['aksi']=='edit')
	{
			if(isset($_POST['Update']))
				{
					
					$jm = $_POST['jenis'];
					$ket = $_POST['keterangan'];
					
					$sql=mysql_query("UPDATE kerusakan SET
					jenis_diesel='$jm', 
					keterangan='$ket' where id_kerusakan='$_POST[id_edit]'");
					 
					if($sql)
					{
						header('location:index.php?p=kerusakan');
					}
					
					
					
				}
	}
?>
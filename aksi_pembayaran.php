<?php
include('koneksi.php');
	if($_GET['aksi']=='hapus')
	{
		$hapus=mysql_query("DELETE FROM pembayaran WHERE id=$_GET[id_hapus]");
		if($hapus) header('location:index.php?p=pembayaran');
	}
	if($_GET['aksi']=='entri')
	{
			if(isset($_POST['submit']))
					{
						$jen = $_POST['jenis'];
						$ket = $_POST['keterangan'];
						$sql=mysql_query("INSERT INTO pembayaran (jenis_pembayaran,keterangan) VALUES ('$jen','$ket')");
						
						if($sql)
						{
							header('location:index.php?p=pembayaran');
							echo "<script> alert('Komentar berhasil dikirim') </script>";
						}
					}
	}
	if($_GET['aksi']=='edit')
	{
			if(isset($_POST['Update']))
				{
					
					$jen = $_POST['jenis'];
					$ket = $_POST['keterangan'];
					
					$sql=mysql_query("UPDATE pembayaran SET
					jenis_pembayaran='$jen', 
					keterangan='$ket' where id='$_POST[id_edit]'");
					 
					if($sql)
					{
						header('location:index.php?p=pembayaran');
					}
					
					
					
				}
	}
?>
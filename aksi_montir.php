<?php
include('koneksi.php');
	if($_GET['aksi']=='hapus')
	{
		$hapus=mysql_query("DELETE FROM montir WHERE id_montir='$_GET[id_hapus]'");
		if($hapus) header('location:index.php?p=montir');
	}
	if($_GET['aksi']=='entri')
	{
			if(isset($_POST['kirim']))
					{
						
						$nm = $_POST['nama'];
						$nom = $_POST['no'];
						$al = $_POST['alamat'];
						$sql=mysql_query("INSERT INTO montir (nama_montir,no_telp,alamat) VALUES ('$nm','$nom','$al')");
						
						if($sql)
						{
							header('location:index.php?p=montir');
							echo "<script> alert('Komentar berhasil dikirim') </script>";
						}
					}
	}
	if($_GET['aksi']=='edit')
	{
			if(isset($_POST['Update']))
				{
						$nm = $_POST['nama'];
						$nom = $_POST['no'];
						$al = $_POST['alamat'];
					
					$sql=mysql_query("UPDATE penerbit SET
					nama_montir='$nm',
					no_telp='$nom', 
					alamat='$al'  where idp_montir='$_POST[id_edit]'");
					 
					if($sql)
					{
						header('location:index.php?p=montir');
						
					}
					
					
				}
	}
?>
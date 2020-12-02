<?php
include('koneksi.php');
	if($_GET['aksi']=='hapus')
	{
		$hapus=mysql_query("DELETE FROM pelanggan WHERE idpelanggan='$_GET[id_hapus]'");
		if($hapus) header('location:index.php?p=pelanggan');
	}
	if($_GET['aksi']=='entri')
	{
			if(isset($_POST['kirim']))
					{
						
						$nm = $_POST['nama'];
						$tgl = $_POST['tanggal_booking'];
						$mntr = $_POST['montir'];
						$al = $_POST['alamat'];
						$rusak = $_POST['kerusakan'];
						$byr = $_POST['pembayaran'];
						$telp = date("Y-m-d");
						$sql=mysql_query("INSERT INTO pelanggan (nama,tanggal_booking,no_telp,alamat,montir,kerusakan,pembayaran) VALUES ('$nm','$tgl','$telp','$al','$mntr','$rusak','$byr')");
						
						if($sql)
						{
							header('location:index.php?p=pelanggan');
							echo "<script> alert('Komentar berhasil dikirim') </script>";
						}
					}
	}
	if($_GET['aksi']=='edit')
	{
			if(isset($_POST['Update']))
				{
					   		$nm = $_POST['nama'];
						$tgl = $_POST['tanggal_booking'];
						$mntr = $_POST['montir'];
						$al = $_POST['alamat'];
						$rusak = $_POST['kerusakan'];
						$byr = $_POST['pembayaran'];
						$telp = $_POST['telp'];
					$sql=mysql_query("UPDATE pelanggan SET
						nama='$nm',
						tanggal_booking='$tgl',
						montir='$mntr',
						alamat='$al',					
						kerusakan='$rusak',
						pembayaran='$byr',
						no_telp='$telp' where idpelanggan='$_POST[id_edit]'");
					 
					if($sql)
					{
						header('location:index.php?p=pelanggan');
						
					}
					
					
				}
	}
?>
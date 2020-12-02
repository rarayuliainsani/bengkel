
<?php
	$proses=isset($_GET['proses']) ? $_GET['proses'] : 'list';
	switch($proses){
	case 'list':
?>
				<h1>Pelanggan Bengkel</h1>
			<a href="login.php"> LogOut</a> <br>
			<a href="?p=pelanggan&proses=entri" class="btn btn-primary"> + Tambah Pelanggan </a>
			<table class="table table-hover">
			<tr>
			
				<th>Nama</th>
				<th>Tanggal Booking</th>
				<th>Montir</th>
				<th>Alamat</th>
				<th>Kerusakan</th>
				<th>Pembayaran</th>
				<th>No Telp</th>
				<th>Aksi</th>
			</tr>

			<?php 
			
			$sql=mysql_query("select * from pelanggan");
			while ($data=mysql_fetch_array($sql)) {
			?>
			<tr>
				
				<td><?php echo $data['nama'];?></td>
				<td><?php echo $data['tanggal_booking'];?></td>
				<td><?php echo $data['montir'];?></td>
				<td><?php echo $data['alamat'];?></td>
				<td><?php echo $data['kerusakan'];?></td>
				<td><?php echo $data['pembayaran'];?></td>
				<td><?php echo $data['no_telp'];?></td>
				
				
				<td> <a href="aksi_pelanggan.php?aksi=hapus&id_hapus=<?php echo $data['idpelanggan'];?>" onclick="return confirm('yakin akan menghapus data?')"class="btn btn-success"> <span class="glyphicon glyphicon-trash">Hapus</a> 
				| <a href="?p=pelanggan&proses=edit&id_edit=<?php echo $data['idpelanggan'];?>"class="btn btn-danger"> <span class="glyphicon glyphicon-pencil"> Edit</a></td>
			</tr>	
			<?php
			}
			?>
		    </table>
<?php	
	break;
	case 'entri':
?>
			<p>DAFTAR PELANGGAN </p>
			<form method="POST" action="aksi_pelanggan.php?aksi=entri"  class="form-horizontal" role="form" >

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pelanggan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" placeholder="Nama">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Booking</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tanggal" placeholder="Tanggal">
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Montir</label>
     <div class="col-sm-10">
    	<select name="montir"  class="form-control">
						<option>-Pilih-</option>
						<?php $ambil_montir=mysql_query("SELECT * from montir");
							while ($data= mysql_fetch_array($ambil_montir))
							{echo "<option value=$data[nama_montir]>$data[nama_montir]</option>";
							}
						?> 
		</select>
  	</div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea> 
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kerusakan</label>
     <div class="col-sm-10">
    	<select name="kerusakan"  class="form-control">
						<option>-Pilih-</option>
						<?php $ambil_kerusakan=mysql_query("SELECT * from kerusakan");
							while ($data= mysql_fetch_array($ambil_kerusakan))
							{echo "<option value=$data[keterangan]>$data[keterangan]</option>";
							}
						?> 
		</select>
  	</div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pembayaran</label>
     <div class="col-sm-10">
    	<select name="pembayaran"  class="form-control">
						<option>-Pilih-</option>
						<?php $ambil_pembayaran=mysql_query("SELECT * from pembayaran");
							while ($data= mysql_fetch_array($ambil_pembayaran))
							{echo "<option value=$data[jenis_pembayaran]>$data[jenis_pembayaran]</option>";
							}
						?> 
		</select>
  	</div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No Telepon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="telp" placeholder="No Telp">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="kirim" value="kirim" class="btn btn-default">Kirim</button>
   </div>
   </div>
</form>

			
<?php
	break;
	case 'edit';
		
		$edit = mysql_query("SELECT * FROM pelanggan WHERE idpelanggan = '$_GET[id_edit]'");
		$data = mysql_fetch_array($edit);

?>
	<form method="POST" action="aksi_pelanggan.php?aksi=edit"  class="form-horizontal" role="form" >

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Pelanggan</label>
    <div class="col-sm-10">
      <input type="hidden" value="<?php echo $data['idpelanggan'];?>" name="id_edit">
	 <input type="text" class="form-control" value="<?php echo $data['nama'];?>" name="nama">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Booking</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $data['tanggal_booking'];?>" name="tanggal">
    </div>
    </div>
     <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Montir</label>
     <div class="col-sm-10">
    	<input type="text" class="form-control" value="<?php echo $data['montir'];?>" name="montir">
  	</div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $data['alamat'];?>" name="alamat">
  </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Kerusakan</label>
     <div class="col-sm-10">
    	<input type="text" class="form-control" value="<?php echo $data ['kerusakan'];?>" name="kerusakan">
  	</div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pembayaran</label>
     <div class="col-sm-10">
    	<input type="text" class="form-control" value="<?php echo $data['pembayaran'];?>" name="pembayaran">
  	</div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No Telepon</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" value="<?php echo $data['no_telp'];?>" name="telp">
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="Update" value="Update" class="btn btn-default">Kirim</button>
   </div>
   </div>
</form>
	
		<?php
	break;
	}

?>


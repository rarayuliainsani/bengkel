
<?php
	$proses=isset($_GET['proses']) ? $_GET['proses'] : 'list';
	switch($proses){
	case 'list':
?>
				<h1>Montir</h1>
			<a href="login.php"> LogOut</a> <br>
			<a href="?p=montir&proses=entri" class="btn btn-primary"> + Tambah Daftar Montir </a>
			<table class="table table-hover">
			<tr>
				<th>Id Montir</th>
				<th>Nama Montir</th>
				<th>No_Telp</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</tr>

			<?php 
			
			$sql=mysql_query("select * from montir");
			while ($data=mysql_fetch_array($sql)) {
			?>
			<tr>
				<td><?php echo $data['id_montir'];?></td>
				
				<td><?php echo $data['nama_montir'];?></td>
				<td><?php echo $data['no_telp'];?></td>
				<td><?php echo $data['alamat'];?></td>
				
				
				<td> <a href="aksi_montir.php?aksi=hapus&id_hapus=<?php echo $data['id_montir'];?>" onclick="return confirm('yakin akan menghapus data?')" class="btn btn-success"> <span class="glyphicon glyphicon-trash" ></span>Hapus</a> 
				| <a href="?p=montir&proses=edit&id_edit=<?php echo $data['id_montir'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-pencil"> </span> Edit</a></td>
			</tr>	
			<?php
			}
			?>
		    </table>
<?php	
	break;
	case 'entri':
?>
			<p>DAFTAR NAMA MONTIR </p>
			<form method="POST" action="aksi_montir.php?aksi=entri"  class="form-horizontal" role="form" >

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Montir</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama" placeholder="Nama">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No Telepon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="telp" placeholder="No Telp">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea> 
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
		
		$edit = mysql_query("SELECT * FROM montir WHERE id_montir = '$_GET[id_edit]'");
		$data = mysql_fetch_array($edit);

?>
<form method="POST" action="aksi_montir.php?aksi=edit"  class="form-horizontal" role="form" >

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Montir</label>
    <div class="col-sm-10">
     <input type="hidden" value="<?php echo $data['id_montir'];?>" name="id_edit">
				<input type="text" class="form-control" value="<?php echo $data['nama_montir'];?>" name="nama">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">No Telepon</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $data['no_telp'];?>" name="no">
  </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
      <textarea class="form-control" value="<?php echo $data ['alamat'];?>"" name="alamat"></textarea> 
    </div>
  </div>
	<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="Update" value="Update" class="btn btn-default">Update</button>
   </div>
   </div>					
					
			</form>
		<?php
	break;
	}

?>


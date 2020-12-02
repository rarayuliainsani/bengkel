<?php 
	$proses=isset($_GET['proses']) ?$_GET['proses'] : 'list' ;
	switch($proses)
	{
		case 'list' :
		?>
			<h1> List Pembayaran </h1>
		<a href="logout.php" > Logout </a><br/>
		<a href="?p=pembayaran&proses=entri" class="btn btn-primary"> + Tambah Data Pembayaran</a>
		<table class="table table-hover" >
		<tr>

			<th> Jenis Pembayaran </th>
			<th> Keterangan</th>
			<th> Aksi </th>
			
		</tr>
		<?php
		$sql=mysql_query("SELECT * FROM pembayaran");
		
			while($data=mysql_fetch_array($sql))
			{
		?>
				<tr>
					<td> <?php echo $data['jenis_pembayaran'];?> </td>
					<td> <?php echo $data['keterangan'];?></td>
						<td> <a href="aksi_pembayaran.php?aksi=hapus&id_hapus=<?php echo $data['idpembayaran'];?>" onclick="return confirm('yakin akan menghapus data?')" class="btn btn-success"> <span class="glyphicon glyphicon-trash" ></span>Hapus</a> 
				| <a href="?p=pembayaran&proses=edit&id_edit=<?php echo $data['idpembayaran'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-pencil"> </span> Edit</a></td>
				</tr>
				<?php
			
			}
			?>
		</table>
<?php 
		break;
		case 'entri' :
?>
<form method="POST" action="aksi_pembayaran.php?aksi=entri"  class="form-horizontal" role="form" >
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Pembayaran</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="jenis" placeholder="Jenis Pembayaran">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="keterangan" placeholder="keterangan">
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" value="submit" class="btn btn-default">Kirim</button>
   </div>
   </div>
  </form>
			
<?php
		break;
		case 'edit' :
	
			$edit = mysql_query("SELECT * FROM pembayaran WHERE idpembayaran='$_GET[id_edit]'");
			$data = mysql_fetch_array($edit);
?>
<form method="POST" action="aksi_pembayaran.php?aksi=edit"  class="form-horizontal" role="form" >
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Pembayaran</label>
    <div class="col-sm-10">
      <input type="hidden" value="<?php echo $data['idpembayaran'];?>" name="id_edit">
			<input type="text"  class="form-control" value="<?php echo $data['jenis_pembayaran'];?>" name="jenis">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" value="<?php echo $data['keterangan'];?>" name="keterangan">
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

<?php 
	$proses=isset($_GET['proses']) ?$_GET['proses'] : 'list' ;
	switch($proses)
	{
		case 'list' :
		?>
			<h1> List Kerusakan  </h1>
		<a href="logout.php" > Logout </a><br/>
		<a href="?p=kerusakan&proses=entri" class="btn btn-primary"> + Tambah Data Kerusakan</a>
		<table class="table table-hover" >
		<tr>
			<th> Jenis Diesel </th>
			<th> Keterangan</th>
			<th> Aksi </th>
			
		</tr>
		<?php
		$sql=mysql_query("SELECT * FROM kerusakan");
		
			while($data=mysql_fetch_array($sql))
			{
		?>
				<tr>
				
					<td> <?php echo $data['jenis_diesel'];?> </td>
					<td> <?php echo $data['keterangan'];?></td>
						<td> <a href="aksi_kerusakan.php?aksi=hapus&id_hapus=<?php echo $data['id_kerusakan'];?>" onclick="return confirm('yakin akan menghapus data?')" class="btn btn-success"> <span class="glyphicon glyphicon-trash" ></span>Hapus</a> 
				| <a href="?p=kerusakan&proses=edit&id_edit=<?php echo $data['id_kerusakan'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-pencil"> </span> Edit</a></td>
				</tr>
				<?php
			
			}
			?>
		</table>
<?php 
		break;
		case 'entri' :
?>
<form method="POST" action="aksi_kerusakan.php?aksi=entri"  class="form-horizontal" role="form" >
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Jenis diesel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="jenis" placeholder="Jenis diesel">
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
      <button type="submit" name="kirim" value="kirim"class="btn btn-default">Kirim</button>
   </div>
   </div>
  </form>
			
<?php			
		break;
		case 'edit' :
	
			$edit = mysql_query("SELECT * FROM kerusakan WHERE id_kerusakan='$_GET[id_edit]'");
			$data = mysql_fetch_array($edit);
?>
				
				<form method="POST" action="aksi_kerusakan.php?aksi=edit"  class="form-horizontal" role="form" >
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Jenis diesel</label>
    <div class="col-sm-10">
     <input type="hidden" value="<?php echo $data['idkerusakan'];?>" name="id_edit">
			<input type="text" class="form-control"  value="<?php echo $data['jenis_diesel'];?>" name="jenis">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  value="<?php echo $data['keterangan'];?>" name="keterangan">
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="Update" value="Update" class="btn btn-default">update</button>
   </div>
   </div>
  </form>
	
<?php

	break;
}
?>

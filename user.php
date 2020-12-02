<html>
<html>
	<head>
		<title>User</title>
	</head>
		<body>
			<form method="POST" action="">
				<table>
					
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="user"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="pass"> </td>
					</tr>
					<tr>
						<td>Level</td>
						<td>:</td>
						<td><input type="text" name="level"></td>
					</tr>
					
					<tr>
					<td></td>
					<td></td>
						<td><input type="submit" name="kirim" value="kirim"></td>
					</tr>
				</table>
			</form>
			<?php
				mysql_connect('localhost','root','');
				mysql_select_db('bengkel');
				
				if(isset($_POST['kirim']))
				{
					
					$us = $_POST['user'];
					$pw=md5($_POST['pass']);
					$lv = $_POST['level'];
					$sql=mysql_query("INSERT INTO user (username,password,level) VALUES ('$us','$pw','$lv')");
					
					if($sql)
					{
						echo "<script> alert('Komentar berhasil dikirim') </script>";
					}
				}
			?>
		</body>
</html>
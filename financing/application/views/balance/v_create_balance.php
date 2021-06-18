<h1>Tambah Saldo</h1>
<br>
<form method="POST" action="<?= site_url('balance/process');?>">
<table width="30%">
		<tr>
				<td>User ID</td>
				<td>
					<select name="id_users">
							<option>-Pilih User-</option>
							<?php foreach ($balance as $row ) { ?>
									<option value="<?= $row['id'];?>"><?= $row['name'];?></option>
								<?php } ?>
					</select>
				</td>
					<td>Jumlah</td>
				<td>
					<input type="number" name="balance">
				</td>
		</tr>

</table>

<input type="submit" value="tambah">
</form>

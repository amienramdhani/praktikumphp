<h1>Tambah Transaksi</h1>
<br>
<form method="POST" action="<?= site_url('transaksi/process');?>">
Nama   :
	<select name="id_users">
			<option>-Pilih User-</option>
			<?php foreach ($transaksi as $row ) { ?>
					<option value="<?= $row['id'];?>"><?= $row['name'];?></option>
				<?php } ?>
	</select>
<br><br>
	status	:
	<select name="status">
			<option value="IN">In</option>
			<option value="OUT">Out</option>
		</select>
		<br><br>
	Amount	: <input type="number" name="amount"><br><br>

<input type="submit" value="tambah">
</form>

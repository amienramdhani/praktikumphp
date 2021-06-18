<h1>Detail User</h1>
	<hr>
	Nama : <?= $view_user['name'];?><br/>
	Alamat : <?= $view_user['address'];?><br/>
	Gender : <?= $view_user['gender'];?><br/>
	Saldo : <?= $view_user['balance'];?><br/>
	<hr>
	<table class="table">
		<tr>
			<td>Status</td>
			<td>Jumlah</td>
			<td>Tanggal</td>
			<td>Aksi</td>
		</tr>
		<?php 
		foreach ($list_transaksi as $row) { ?>
			<tr>
				<td><?= $row['status']; ?></td>
				<td><?= $row['amount']; ?></td>
				<td><?= $row['created_date']; ?></td>
				<td><a href="<?= site_url('user/delete_transaksi/'.$row['id'].'/'.$view_user['id']); ?>">Delete</a></td>
			</tr>
<?php 

} ?>
	</table>

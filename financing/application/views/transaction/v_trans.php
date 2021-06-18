<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
</head>
<body>
	<a href="<?= site_url('transaksi/create'); ?>"><button>Tambah Transaksi</button></a><br><br>
	<table border="1">
		<thead>
			<tr>
				<td>id_users</td>
				<td>Status</td>
				<td>Amount</td>
				<td>Tanggal</td>
				<th colspan="3">Action</th>

			</tr>
		</thead>

		<tbody>
			<?php foreach ($transaksi as $row) { ?>
			<tr>
				<td><?= $row['id_users'];?></td>
				<td><?= $row['status'];?></td>
				<td><?= $row['amount'];?></td>
				<td><?= $row['created_date'];?></td>
				<td><a href="<?= site_url('transaksi/view/'.$row['id']);?>">Detail</a></td>
				<td><a href="<?= site_url('transaksi/delete_transaksi/'.$row['id']);?>">Hapus</a></td>
				<td><a href="<?= site_url('transaksi/edit/'.$row['id']);?>">Edit</a></td>
			</tr>

		<?php } ?>
		</tbody>
	</table>

</body>
</html>

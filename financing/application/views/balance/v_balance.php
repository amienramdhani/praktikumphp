<!DOCTYPE html>
<html>
<head>
	<title>User</title>
</head>
<body>
	<a href="<?= site_url('balance/create'); ?>"><button>Tambah Balance</button></a><br><br>
	<table border="1">
		<thead>
			<tr>
				<td>Name</td>
				<td>Address</td>
				<td>Gender</td>
				<td>Balance</td>
				<th colspan="3">Action</th>

			</tr>
		</thead>

		<tbody>
			<?php foreach ($balance as $row) { ?>
			<tr>
				<td><?= $row['name'];?></td>
				<td><?= $row['address'];?></td>
				<td><?= $row['gender'];?></td>
				<td><?= $row['balance'];?></td>
				<td><a href="<?= site_url('balance/view/'.$row['id']);?>">Detail</a></td>
				<td><a href="<?= site_url('balance/delete_balance/'.$row['id']);?>">Hapus</a></td>
				<td><a href="<?= site_url('balance/edit/'.$row['id']);?>">Edit</a></td>
			</tr>

		<?php } ?>
		</tbody>
	</table>

</body>
</html>

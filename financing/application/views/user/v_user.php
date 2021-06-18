<!DOCTYPE html>
<html>
<head>
	<title>User</title>
</head>
<body>
	<a href="<?= site_url('user/create'); ?>"><button>Tambah User</button></a><br><br>
	<table border="1">
		<thead>
			<tr>
				<td>NIK</td>
				<td>Name</td>
				<td>Address</td>
				<td>Gender</td>
				<td>Role</td>
				<th colspan="3">Action</th>

			</tr>
		</thead>

		<tbody>
			<?php foreach ($user as $row) { ?>
			<tr>
				<td><?= $row['nik'];?></td>
				<td><?= $row['name'];?></td>
				<td><?= $row['address'];?></td>
				<td><?= $row['gender'];?></td>
				<td><?= $row['role'];?></td>
				<td><a href="<?= site_url('user/view/'.$row['id']);?>">Detail</a></td>
				<td><a href="<?= site_url('user/delete_user/'.$row['id']);?>">Hapus</a></td>
				<td><a href="<?= site_url('user/edit/'.$row['id']);?>">Edit</a></td>
			</tr>

		<?php } ?>
		</tbody>
	</table>

</body>
</html>

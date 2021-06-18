<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table border="1">
		<thead>
			<tr>
				<td>Name</td>
				<td>Address</td>
				<td>Balance</td>

			</tr>
		</thead>

		<tbody>
			<?php foreach ($balance as $row) { ?>
			<tr>				
				<td><?= $row['name'];?></td>
				<td><?= $row['address'];?></td>
				<td><?= $row['balance'];?></td>
			</tr>

		<?php } ?>
		</tbody>
	</table>

</body>
</html>
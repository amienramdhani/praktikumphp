<h1>Edit Balance</h1>
<br>
<form method="POST" action="<?= site_url('balance/process_edit');?>">
	<input type="hidden" name="id" value="<?= $balance['id']; ?>">
	ID User	: <input type="text" name="id_users" value="<?= $balance['id_users'];?>"><br><br>
	Saldo	: <input type="text" name="balance" value="<?= $balance['balance'];?>"><br><br>

<input type="submit" value="Edit">
</form>

<!-- name di form adalah untuk menamakan field dalam database -->

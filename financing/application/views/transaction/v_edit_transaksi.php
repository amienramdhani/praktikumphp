<h1>Edit Transaksi</h1>
<br>
<form method="POST" action="<?= site_url('transaksi/process_edit');?>">

  <input type="hidden" name="id" value="<?= $trans['id']; ?>">
	id_user	: <input type="text" name="id_users" value="<?= $trans['id_users']; ?>"><br><br>
	status	: <input type="text" name="status"   value="<?= $trans['status']; ?>"><br><br>
	Amount	: <input type="text" name="amount"    value="<?= $trans['amount']; ?>"><br><br>
  Tanggal	: <input type="date" name="updated_date"   value="<?= $trans['updated_date']; ?>"><br><br>

<input type="submit" value="Edit">
</form>

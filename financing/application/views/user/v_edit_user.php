<h1>Edit User</h1>
<br>
<form method="POST" action="<?= site_url('user/process_edit');?>">
	<input type="hidden" name="id" value="<?= $user['id']; ?>">
	NIK		: <input type="text" name="nik" value="<?= $user['nik'];?>"><br><br>
	Name	: <input type="text" name="name" value="<?= $user['name'];?>"><br><br>
	Gender	: <select name="gender" value="<?= $user['gender'];?>">
					<option value="male">Male</option>
					<option value="female">Female</option>

			  </select><br><br>
	Address	: <textarea name="address" value="<?= $user['address'];?>"></textarea><br><br>
	Role	:   <input type="text" name="role" value="<?= $user['role'];?>"><br><br>

<input type="submit" value="Edit">
</form>

<!-- name di form adalah untuk menamakan field dalam database -->

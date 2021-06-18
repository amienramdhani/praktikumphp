<h1>Tambah User</h1>
<br>
<form method="POST" action="<?= site_url('user/process');?>">

	NIK			: <input type="text" name="nik"><br><br>
	Name		: <input type="text" name="name"><br><br>
	Gender	: <select name="gender" value="gender">
					<option value="male">Male</option>
					<option value="female">Female</option>

			  		</select><br><br>
  Address	: <textarea name="address" ></textarea><br><br>
	Role		: <input type="text" name="role"><br><br>

<input type="submit" value="tambah">
</form>

<!-- name di form adalah untuk menamakan field dalam database -->

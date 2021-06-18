<h1>Transfer Uang</h1>
<br>
<form method="POST" action="<?= site_url('transfer/process');?>">
<table width="30%">
		<tr>
				<td>Transfer from</td>
				<td>
					<select name="id_users_from">
							<option>-Pilih User-</option>
							<?php foreach ($transfer as $row ) { ?>
									<option value="<?= $row['id'];?>"><?= $row['name'];?></option>
								<?php } ?>
					</select>
				</td>

        <td>Transfer to</td>
        <td>
          <select name="id_users_to">
              <option>-Pilih User-</option>
              <?php foreach ($transfer as $row ) { ?>
                  <option value="<?= $row['id'];?>"><?= $row['name'];?></option>
                <?php } ?>
          </select>
        </td>

			<td>Jumlah</td>
  				<td>
  					<input type="number" name="amount">
  				</td>
      <td>Note</td>
          <td>
            <input type="text" name="note">
          </td>
		</tr>

</table>

<input type="submit" value="tambah">
</form>

<form action="<?= "insert" ?>" method="post">
	<div>
		<label>ID</label>
		<input type="text" class="form-control" name="id_pengguna" value="<?php echo $getid ?>" readonly>
	</div>
	<br>
	<div>
		<label>NAMA LENGKAP</label>
		<input type="text" class="form-control" name="nama_lengkap" value="">
	</div>
	<br>
	<div>
		<label>JENIS KELAMIN</label>
		<select name="jenis_kelamin" id="">
			<option value="L">L</option>
			<option value="P">P</option>
		</select>
	</div>
	<br>
	<div>
		<label>NO HP</label>
		<input type="text" class="form-control" name="no_hp" value="">
	</div>
	<br>
	<div>
		<label>USERNAME</label>
		<input type="text" class="form-control" name="username" value="">
	</div>
	<br>
	<div>
		<label>LEVEL</label>
		<select name="level" id="">
			<option value="admin">Admin</option>
			<option value="petugas rm">Petugas RM</option>
			<option value="petugas poli">Petugas Poli</option>
		</select>
	</div>
	<br>
	<div>
		<label>STATUS</label>
		<select name="status_aktif" id="">
			<option value="1">Aktif</option>
			<option value="0">Non aktif</option>
		</select>
	</div>
	<br>
	<div>
		<label>PASSWORD</label>
		<input type="text" class="form-control" name="password" value="">
	</div>
	<button class="tomboltop btn btn-success" type="submit">TAMBAH</button>
</form>
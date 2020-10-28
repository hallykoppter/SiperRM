<form action="<?= "insert" ?>" method="post">
	<div>
		<label>NO RM</label>
		<input type="text" class="form-control" name="no_rm" value="">
	</div>
	<div>
		<label>NAMA PASIEN</label>
		<input type="text" class="form-control" name="nama_pasien" value="">
	</div>
	<br>
	<div>
		<label>JENIS KELAMIN</label>
		<select name="jenis_kelamin" id="">
			<option value="L">LAKI - LAKI</option>
			<option value="P">PEREMPUAN</option>
		</select>
	</div>
	<br>
	<div>
		<label>TANGGAL LAHIR</label>
		<input type="date" class="form-control" name="tgl_lahir" value="">
	</div>
	<div>
		<label>ALAMAT</label>
		<input type="text" class="form-control" name="alamat" value="">
	</div>
	<!-- <div>
        <label>NO RM</label>
        <input type="text" class="form-control" name="" value="">
    </div> -->
	<button class="tomboltop btn btn-success" type="submit">TAMBAH</button>
</form>

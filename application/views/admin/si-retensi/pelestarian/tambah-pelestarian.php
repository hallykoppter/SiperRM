<form action="<?= base_url('pelestarian/store') ?>" method="post">
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="norm">No RM</label>
				<select class="form-control" name="norm" id="norm">
					<option disable>--Pilih No RM--</option>
					<?php foreach ($pasien as $p) : ?>
						<option value="<?= $p['no_rm']; ?>"><?= $p['no_rm']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="exampleInputEmail1">Diagnosa</label>
				<input type="text" name="diagnosa" id="diagnosa" value="" class="form-control" disabled>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="exampleInputEmail1">Tanggal Pelestarian</label>
				<input type="date" name="tanggal_pelestarian" class="form-control">
			</div>
		</div>
		<div class="col-md">
			<div class="form-group">
				<label for="exampleInputEmail1">Tanggal Kunjungan Terakhir</label>
				<input type="date" name="tanggal_kunjungan" class="form-control">
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<a href="<?= base_url('pelestarian') ?>" class="btn btn-secondary">Kembali</a>
</form>

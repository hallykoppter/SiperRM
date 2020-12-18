<form action="<?= base_url('retensi-edit') ?>" method="post">
	<input type="hidden" name="id_permintaan" value="<?= $retensi['id_permintaan']; ?>">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="">No RM</label>
				<input type="text" class="form-control" id="no_rm" name="norm" value="<?= $retensi['no_rm'] ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="">Jenis Pelayanan</label>
				<select class="form-control js-example-basic-single" name="jenis_pelayanan">
					<?php foreach ($jenis_pelayanan as $jp) : ?>
						<?php if ($jp['nama_poli'] == $retensi['jenis_pelayanan']) : ?>
							<option value="<?= $jp['nama_poli']; ?>" selected><?= $jp['nama_poli']; ?></option>
						<?php else : ?>
							<option value="<?= $jp['nama_poli']; ?>"><?= $jp['nama_poli']; ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="">Diagnosa</label>
				<input type="text" name="diagnosa" id="diagnosa" class="form-control" value="<?= $retensi['diagnosa'] ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="">Tanggal Kunjungan</label>
				<input type="text" name="tanggal_kunjungan" class="form-control" value="<?= $retensi['tanggal_kunjungan'] ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="">Tanggal Pemindahan</label>
				<input type="text" name="tanggal_pemindahan" class="form-control" value="<?= $retensi['tanggal_pemindahan'] ?>"readonly>
			</div>
		</div>

	</div>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<a href="<?= base_url('retensi') ?>" class="btn btn-secondary">Kembali</a>
</form>
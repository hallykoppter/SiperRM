<form action="<?= base_url('retensi-store') ?>" method="post">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="no_rm">No RM</label>
				<select class="form-control" name="no_rm" id="nomor">
					<option disable>--Pilih No RM--</option>
					<?php foreach ($pasien as $p) : ?>
						<option value="<?= $p['no_rm']; ?>"><?= $p['no_rm']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Jenis Pelayanan</label>
				<select class="form-control" name="jenis_pelayanan">
					<option disable>--Pilih Jenis Pelayanan--</option>
					<?php foreach ($jenis_pelayanan as $jp) : ?>
						<option value="<?= $jp['nama_poli']; ?>"><?= $jp['nama_poli']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="exampleInputEmail1">Diagnosa</label>
				<input type="text" name="diagnosa" id="diagnosa" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="tanggal_kunjungan">Tanggal Kunjungan Terakhir</label>
				<input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" value="dd-mm-yyyy">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Tanggal Pemindahan</label>
				<input type="date" name="tanggal_pemindahan" value="<?= date('Y-m-d') ?>" class="form-control" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<label for="">Poli yang pinjam</label>
			<select class="form-control selectpicker" data-live-search="true" name="poli" id="">
				<option>---Pilih Data---</option>
				<?php foreach ($poli as $p) : ?>
					<option value="<?= $p['id_poli'] ?>"><?= $p['nama_poli'] ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<a href="<?= base_url('retensi') ?>" class="btn btn-secondary">Kembali</a>
</form>
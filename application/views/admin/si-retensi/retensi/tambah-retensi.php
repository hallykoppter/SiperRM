<form action="<?= base_url('retensi-store') ?>" method="post">
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="norm">No RM</label>
				<select class="form-control js-example-basic-single" name="norm">
					<option disable>--Pilih No RM--</option>
					<?php foreach ($pasien as $p) : ?>
						<option value="<?= $p['no_rm']; ?>"><?= $p['no_rm']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="col-md">
			<div class="form-group">
				<label for="exampleInputEmail1">Jenis Pelayanan</label>
				<select class="form-control js-example-basic-single" name="jenis_pelayanan">
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
		<div class="col-md">
			<div class="form-group">
				<label for="exampleInputEmail1">Tanggal Kunjungan Terakhir</label>
				<input type="text" name="tanggal_kunjungan" class="form-control datepicker" value="dd/mm/yyyy">
			</div>
		</div>
		<div class="col-md">
			<div class="form-group">
				<label for="exampleInputEmail1">Tanggal Pemindahan</label>
				<input type="text" name="tanggal_pemindahan" value="dd/mm/yyyy" class="form-control datepicker">
			</div>
		</div>
		<div class="col-md">
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
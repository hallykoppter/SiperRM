<form action="<?= base_url('retensi-edit') ?>" method="post">
	<input type="hidden" name="id_permintaan" value="<?= $retensi['id_permintaan']; ?>">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="norm">No RM</label>
				<select class="form-control js-example-basic-single" name="norm">
					<option disable>--Pilih No RM--</option>
					<?php foreach ($pasien as $p) : ?>
						<?php if ($p['no_rm'] == $retensi['no_rm']) : ?>
							<option value="<?= $p['no_rm']; ?>" selected><?= $p['no_rm']; ?></option>
						<?php else : ?>
							<option value="<?= $p['no_rm']; ?>"><?= $p['no_rm']; ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Jenis Pelayanan</label>
				<select class="form-control js-example-basic-single" name="jenis_pelayanan">
					<option disable>--Pilih Jenis Pelayanan--</option>
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
		<div class="col-md-6">
			<label for="">Poli yang pinjam</label>
            <select class="form-control selectpicker" data-live-search="true" name="poli" id="">
                <option>---Pilih Data---</option>
                    <?php foreach ($poli as $p) : ?>
                        <?php if ($p['id_poli'] == $retensi['id_poli']) : ?>
                            <option value="<?= $p['id_poli'] ?>" selected><?= $p['nama_poli'] ?></option>
                        <?php else : ?>
                            <option value="<?= $p['id_poli'] ?>"><?= $p['nama_poli'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
            </select>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="exampleInputEmail1">Diagnosa</label>
				<input type="text" name="diagnosa" id="diagnosa" class="form-control" value="<?= $retensi['diagnosa'] ?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Tanggal Kunjungan</label>
				<input type="text" name="tanggal_kunjungan" class="form-control datepicker" value="<?= $retensi['tanggal_kunjungan'] ?>">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Tanggal Pemindahan</label>
				<input type="text" name="tanggal_pemindahan" class="form-control datepicker" value="<?= $retensi['tanggal_pemindahan'] ?>">
			</div>
		</div>

	</div>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<a href="<?= base_url('retensi') ?>" class="btn btn-secondary">Kembali</a>
</form>
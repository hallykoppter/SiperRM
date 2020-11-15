<form action="<?= base_url('pelestarian/update') ?>" method="post">
    <input type="hidden" name="id_pelestarian" value="<?= $pelestarian['id_pelestarian'] ?>">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="norm">No RM</label>
                <input type="text" class="form-control" id="no_rm" name="norm" value="<?= $pelestarian['no_rm'] ?>" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="">Diagnosa</label>
                <input type="text" name="diagnosa" id="diagnosa" class="form-control" value="<?= $pelestarian['diagnosa'] ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="">Tanggal Kunjungan Terakhir</label>
                <input type="date" name="tanggal_kunjungan" class="form-control" value="<?= $pelestarian['tanggal_kunjungan'] ?>" readonly>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="">Tanggal Pelestarian</label>
                <input type="date" name="tanggal_pelestarian" class="form-control" value="<?= $pelestarian['tanggal_pelestarian'] ?>" readonly>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="keterangan">Keterangan</label>
				<input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $pelestarian['keterangan'] ?>">
			</div>
		</div>
    </div>
    <div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="scan">Scan RM</label>
				<select class="form-control js-example-basic-single" name="scan" value="<?= $pelestarian['scan']?>">
                <?php
                        $l = ($pelestarian["scan"] == "0") ? "selected" : "";
                        $p = ($pelestarian["scan"] == "1") ? "selected" : "";
                        ?>
                        <option disable>--Pilih Keterangan--</option>
                        <option <?php echo $l ?> value="0">Belum Scan</option>
                        <option <?php echo $p ?> value="1">Sudah Scan</option>
                </select>
			</div>
		</div>
	</div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('pelestarian') ?>" class="btn btn-secondary">Kembali</a>
</form>
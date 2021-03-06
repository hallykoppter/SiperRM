<form action="<?= base_url('pemusnahan/update') ?>" method="post">
    <input type="hidden" name="id_pemusnahan" value="<?= $pemusnahan['id_pemusnahan'] ?>">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="norm">No RM</label>
                <input type="text" class="form-control" id="no_rm" name="norm" value="<?= $pemusnahan['no_rm'] ?>" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="">Diagnosa</label>
                <input type="text" name="diagnosa" id="diagnosa" class="form-control" value="<?= $pemusnahan['diagnosa'] ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="">Tanggal Kunjungan Terakhir</label>
                <input type="date" name="tanggal_kunjungan" class="form-control" value="<?= $pemusnahan['tanggal_kunjungan'] ?>" readonly>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="">Tanggal Pemusnahan</label>
                <input type="date" name="tanggal_pemusnahan" class="form-control" value="<?= $pemusnahan['tanggal_pemusnahan'] ?>" readonly>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="scan">Scan RM</label>
				<select class="form-control js-example-basic-single" name="scan" value="<?= $pemusnahan['scan']?>">
                <?php
                        $l = ($pemusnahan["scan"] == "0") ? "selected" : "";
                        $p = ($pemusnahan["scan"] == "1") ? "selected" : "";
                        ?>
                        <option disable>--Pilih Keterangan--</option>
                        <option <?php echo $l ?> value="0">Belum Scan</option>
                        <option <?php echo $p ?> value="1">Sudah Scan</option>
                </select>
			</div>
		</div>
	</div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('pemusnahan') ?>" class="btn btn-secondary">Kembali</a>
</form>
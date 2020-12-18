<form action="<?= base_url('data-sosial-pasien/update') ?>" method="post">
    <?php
    foreach ($data_rm as $item) {
    ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">NO REKAM MEDIS</label>
                    <input type="hidden" class="form-control" name="no_urut" value="<?php echo $item["no_urut"] ?>">
                    <input type="text" class="form-control" name="no_rm" value="<?php echo $item["no_rm"] ?>">
                </div>
            </div>
			<div class="col-md-6">
                <div class="form-group">
                    <label for="">NAMA PASIEN</label>
                    <input type="text" name="nama_pasien" class="form-control" value="<?php echo $item["nama_pasien"] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">JENIS KELAMIN</label>
                    <select class="form-control js-example-basic-single" name="jenis_kelamin">
                        <?php
                        $l = ($item["jenis_kelamin"] == "L") ? "selected" : "";
                        $p = ($item["jenis_kelamin"] == "P") ? "selected" : "";
                        ?>
                        <option disable>--Pilih Jenis Kelamin--</option>
                        <option <?php echo $l ?> value="L">Laki-Laki</option>
                        <option <?php echo $p ?> value="P">Perempuan</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">TANGGAL LAHIR</label>
                    <input type="date" class="form-control" name="tgl_lahir" value="<?php echo date("Y-m-d", strtotime($item["tgl_lahir"])) ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">ALAMAT</label>
                    <textarea class="form-control" name="alamat"><?php echo $item["alamat"] ?></textarea>
                </div>
            </div>
        </div>
    <?php } ?>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('data-sosial-pasien') ?>" class="btn btn-secondary">Kembali</a>
</form>
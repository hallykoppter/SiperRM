<form action="<?= base_url('data-rm/update') ?>" method="post">
    <?php
    foreach ($data_rm as $item) {
    ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">No Rekam Medis</label>
                    <input type="hidden" class="form-control" name="no_urut" value="<?php echo $item["no_urut"] ?>">
                    <input type="text" class="form-control" name="no_rm" value="<?php echo $item["no_rm"] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
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
                    <label for="">Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control" value="<?php echo $item["nama_pasien"] ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" value="<?php echo date("Y-m-d", strtotime($item["tgl_lahir"])) ?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Status Data</label>
                    <select class="form-control js-example-basic-single" name="status_aktif">
                        <?php
                        $l = ($item["status_aktif"] == "1") ? "selected" : "";
                        $p = ($item["status_aktif"] == "0") ? "selected" : "";
                        ?>
                        <option disable>--Pilih Status Data--</option>
                        <option <?php echo $l ?> value="1">Aktif</option>
                        <option <?php echo $p ?> value="0">Inaktif</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea class="form-control" name="alamat"><?php echo $item["alamat"] ?></textarea>
                </div>
            </div>
        </div>
    <?php } ?>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('data-rm') ?>" class="btn btn-secondary">Kembali</a>
</form>
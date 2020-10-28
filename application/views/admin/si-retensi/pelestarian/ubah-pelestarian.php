<form action="<?= base_url('pelestarian/update') ?>" method="post">
    <input type="hidden" name="id_pelestarian" value="<?= $pelestarian['id_pelestarian'] ?>">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="norm">No RM</label>
                <select class="form-control js-example-basic-single" name="norm">
                    <option disable>--Pilih No RM--</option>
                    <?php foreach ($pasien as $p) : ?>
                        <?php if($p['no_rm'] == $pelestarian['no_rm']) : ?>
                            <option value="<?= $p['no_rm']; ?>" selected><?= $p['no_rm']; ?></option>
                        <?php else: ?>
                            <option value="<?= $p['no_rm']; ?>"><?= $p['no_rm']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="exampleInputEmail1">Diagnosa</label>
                <input type="text" name="diagnosa" id="diagnosa" class="form-control" value="<?= $pelestarian['diagnosa'] ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Kunjungan Terakhir</label>
                <input type="date" name="tanggal_kunjungan" class="form-control" value="<?= $pelestarian['tanggal_kunjungan'] ?>">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Pelestarian</label>
                <input type="date" name="tanggal_pelestarian" class="form-control" value="<?= $pelestarian['tanggal_pelestarian'] ?>">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('pelestarian') ?>" class="btn btn-secondary">Kembali</a>
</form>
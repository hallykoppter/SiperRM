<form action="<?= base_url('pemusnahan/update') ?>" method="post">
    <input type="hidden" name="id_pemusnahan" value="<?= $pemusnahan['id_pemusnahan'] ?>">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="norm">No RM</label>
                <select class="form-control js-example-basic-single" name="norm">
                    <option disable>--Pilih No RM--</option>
                    <?php foreach ($pasien as $p) : ?>
                        <?php if($p['no_rm'] == $pemusnahan['no_rm']) : ?>
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
                <input type="text" name="diagnosa" id="diagnosa" class="form-control" value="<?= $pemusnahan['diagnosa'] ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Kunjungan Terakhir</label>
                <input type="date" name="tanggal_kunjungan" class="form-control" value="<?= $pemusnahan['tanggal_kunjungan'] ?>">
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Pemusnahan</label>
                <input type="date" name="tanggal_pemusnahan" class="form-control" value="<?= $pemusnahan['tanggal_pemusnahan'] ?>">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('pemusnahan') ?>" class="btn btn-secondary">Kembali</a>
</form>
<form action="<?= base_url('data-rm/insert') ?>" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">No Rekam Medis</label>
                <input type="text" class="form-control" name="no_rm">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select class="form-control js-example-basic-single" name="jenis_kelamin">
                    <option disable>--Pilih Jenis Kelamin--</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea class="form-control" name="alamat"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('data-rm') ?>" class="btn btn-secondary">Kembali</a>
</form>
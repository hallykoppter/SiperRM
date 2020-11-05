<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url() . "klpcm" ?>" class="float-right tombol btn btn-primary">Kembali</a>
    </div>
    <div class="col-md-12">
        <form action="<?php echo base_url() . "klpcm/store" ?>" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">No RM</label>
                        <select class="form-control" name="no_rm" id="no_rm">
                            <option>---Pilih Data---</option>
                            <?php foreach ($pasien as $p) : ?>
                                <option value="<?= $p['no_rm'] ?>"><?= $p['no_rm']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="" disabled>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <label for="kelengkapan">Kelengkapan</label>
                        <select class="form-control" name="kelengkapan" id="">
                            <option value="lengkap">Lengkap</option>
                            <option value="Tidak Lengkap">Tidak Lengkap</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Nomor Rekam Medis</label>
                        <select class="form-control" name="no_rm" id="no_rm">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Alergi</label>
                        <select class="form-control" name="alergi" id="alergi">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Alergi</label>
                        <select class="form-control" name="alergi" id="alergi">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tanggal Kunjungan</label>
                        <select class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Unit Layanan</label>
                        <select class="form-control" name="unit" id="unit">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Subjek</label>
                        <select class="form-control" name="subjek" id="subjek">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Objek</label>
                        <select class="form-control" name="objek" id="objek">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Assessment</label>
                        <select class="form-control" name="assessment" id="assessment">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Planning</label>
                        <select class="form-control" name="planning" id="planning">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Jenis Kasus</label>
                        <select class="form-control" name="jenis_kasus" id="jenis_kasus">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Nama dan Paraf Petugas</label>
                        <select class="form-control" name="nama_paraf_pet" id="nama_paraf_pet">
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
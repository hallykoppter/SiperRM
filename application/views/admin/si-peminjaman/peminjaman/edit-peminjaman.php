<div class="row">
    <div class="col-md-12">
        <form action="<?php echo base_url() . "peminjaman/edit" ?>" method="post">
            <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman'] ?>">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">No Rekam Medis</label>
                        <select name="no_rm" id="no_rm" class="form-control">
                            <option value="">-- Pilih No RM --</option>
                            <?php foreach ($pasien as $p) : ?>
                                <?php if ($p['no_rm'] == $peminjaman['no_rm']) : ?>
                                    <option value="<?= $p['no_rm']; ?>" selected><?= $p['no_rm']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $p['no_rm']; ?>"><?= $p['no_rm']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $peminjaman['nama_pasien'] ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="">Pelayanan</label>
                        <input type="text" class="form-control" id="pelayanan" name="pelayanan" value="Rawat Jalan">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam'] ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tgl_kembali" value="<?= $peminjaman['tgl_kembali'] ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tgl_pengembalian" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="">Poli yang pinjam</label>
                        <select class="form-control selectpicker" data-live-search="true" name="poli" id="">
                            <option>---Pilih Data---</option>
                            <?php foreach ($poli as $p) : ?>
                                <?php if ($p['id_poli'] == $peminjaman['id_poli']) : ?>
                                    <option value="<?= $p['id_poli'] ?>" selected><?= $p['nama_poli'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $p['id_poli'] ?>"><?= $p['nama_poli'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo base_url() . "peminjaman" ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
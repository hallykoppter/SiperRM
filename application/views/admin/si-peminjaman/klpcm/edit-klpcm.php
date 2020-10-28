<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url() . "klpcm" ?>" class="float-right tombol btn btn-primary">Kembali</a>
    </div>
    <div class="col-md-12">
        <form action="<?php echo base_url() . "klpcm/edit" ?>" method="post">
            <input type="hidden" name="id_klpcm" value="<?= $klpcm['id_klpcm'] ?>">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">No RM</label>
                        <select class="form-control" name="no_rm" id="no_rm">
                            <option>---Pilih Data---</option>
                            <?php foreach ($pasien as $p) : ?>
                                <?php if ($p['no_rm'] == $klpcm['no_rm']) : ?>
                                    <option value="<?= $p['no_rm'] ?>" selected><?= $p['no_rm']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $p['no_rm'] ?>"><?= $p['no_rm']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $klpcm['nampas'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="">Jenis Kelamin</label>
                        <?php if ($klpcm['jenis_kelamin'] == "L") : ?>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="Laki-Laki" disabled>
                        <?php else : ?>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" disabled>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $klpcm['tgl_lahir'] ?>" disabled>
                    </div>
                    <div class="col-md-12">
                        <label for="">kelengkapan</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['kelengkapan'] == "Lengkap") : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="status_kelengkapan" value="Lengkap" checked>
                                        <label class="form-check-label">
                                            Lengkap
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="status_kelengkapan" value="Tidak Lengkap">
                                        <label class="form-check-label">
                                            Tidak Lengkap
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="status_kelengkapan" value="Lengkap">
                                        <label class="form-check-label">
                                            Lengkap
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="status_kelengkapan" value="Tidak Lengkap" checked>
                                        <label class="form-check-label">
                                            Tidak Lengkap
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Nomor Rekam Medis</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['no_rm'] != null) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" id="norm" type="radio" name="norm" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" id="norm" name="norm" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" id="norm" type="radio" name="norm" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" id="norm" name="norm" value="0">
                                        <label class="form-check-label" checked>
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Alergi</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['alergi'] == 1) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="alergi" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="alergi" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="alergi" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="alergi" value="0" checked>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Tanggal Kunjungan</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['tanggal_kunjungan'] == 1) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="tanggal_kunjungan" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="tanggal_kunjungan" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="tanggal_kunjungan" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="tanggal_kunjungan" value="0" checked>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Unit Layanan</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['unit_layanan'] == 1) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="unit_layanan" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="unit_layanan" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="unit_layanan" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="unit_layanan" value="0" checked>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Subjek</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['subjek'] == 1) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="subjek" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="subjek" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="subjek" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="subjek" value="0" checked>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Objek</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['objek'] == 1) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="objek" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="objek" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="objek" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="objek" value="0" checked>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Assesment</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['assesment'] == 1) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="assesment" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="assesment" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="assesment" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="assesment" value="0" checked>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Planning</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['planning'] == 1) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="planning" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="planning" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="planning" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="planning" value="0" checked>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Jenis Kasus</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['jenis_kasus'] == 1) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="jenis_kasus" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="jenis_kasus" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="jenis_kasus" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="jenis_kasus" value="0" checked>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Nama dan Paraf Petugas</label>
                        <div class="row">
                            <div class="form-check">
                                <?php if ($klpcm['nama_paraf_pet'] == 1) : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="petugas" value="1" checked>
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="petugas" value="0">
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="petugas" value="1">
                                        <label class="form-check-label">
                                            Ada
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-check-input" type="radio" name="petugas" value="0" checked>
                                        <label class="form-check-label">
                                            Tidak ada
                                        </label>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
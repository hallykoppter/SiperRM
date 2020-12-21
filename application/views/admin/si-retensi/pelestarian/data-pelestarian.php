<a href="<?= base_url('pelestarian/tambah'); ?>" class="btn btn-primary float-right">Tambah Data</a>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Diagnosa</th>
        <th>Status Data</th>
        <th>Keterangan</th>
        <th>Status Scan</th>
        <th>Hasil Upload</th>
        <th>Action</th>
    </thead>
    <tfoot>
        <tr>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Diagnosa</th>
            <th>Status Data</th>
            <th>Keterangan</th>
            <th>Status Scan</th>
            <th>Hasil Upload</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($pelestarian as $p) { ?>
            <tr>
                <td><?= $p['no_rm'] ?></td>
                <td><?= $p['nama_pasien'] ?></td>
                <td><?= $p['diagnosa'] ?></td>
                <td>
                    <?php if ($p['tanggal_pelestarian'] == "0000-00-00") : ?>
                        In Aktif
                    <?php else : ?>
                        <?php if ($p['selisih'] >= "730") : ?>
                            Dilestarikan
                        <?php else : ?>
                            In Aktif
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td><?= $p['keterangan'] ?></td>
                <td>
                    <?php if ($p['scan'] == "0") : ?>
                        Belum Scan
                    <?php else : ?>
                        Sudah Scan
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($p['scan'] == "1") : ?>
                        <a href="<?php echo base_url("pelestarian/hasilscan/") . $p["id_pelestarian"] ?>" class="btn btn-success btn-sm"><span> Lihat Berkas</span></a>
                    <?php else : ?>
                    <?php endif; ?>
                </td>
                <td>
                    <a title="Edit" href="<?php echo base_url('pelestarian/edit/' . $p['id_pelestarian']) ?>" class="btn btn-warning btn-sm" id="tombolEdit" style="color: white;"><i class="fa fa-edit"></i></a>
                    <a title="Hapus" href="<?php echo base_url('pelestarian/delete/' . $p['id_pelestarian']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>
                    <form action="<?= base_url('alih-media'); ?>" method="POST">
                        <input type="hidden" name="no_rm" id="no_rm" value="<?= $p['no_rm']; ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Upload Scan</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
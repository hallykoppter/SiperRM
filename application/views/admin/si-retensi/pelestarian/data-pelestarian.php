<a href="<?= base_url('pelestarian/tambah'); ?>" class="btn btn-primary float-right">Tambah Data</a>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Diagnosa</th>
        <th>Status Data</th>
        <th>Keterangan</th>
        <th>Status Scan</th>
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
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($pelestarian as $p) : ?>
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
                    <a title="Edit" href="<?php echo base_url('pelestarian/edit/' . $p['id_pelestarian']) ?>" class="badge badge-warning" id="tombolEdit" style="color: white;"><i class="fa fa-edit"></i></a>
                    <a title="Hapus" href="<?php echo base_url('pelestarian/delete/' . $p['id_pelestarian']) ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a>
                    <a title="Scan" href="<?php echo base_url('alih-media') ?>" class="badge badge-primary" style="color: white;"><i class="fas fa-file-image"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
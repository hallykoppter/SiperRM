<a href="<?= base_url('pelestarian/tambah'); ?>" class="btn btn-primary float-right">Tambah Data</a>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Diagnosa</th>
        <th>Status Data</th>
        <th>Keterangan</th>
        <th>Action</th>
    </thead>
    <tfoot>
        <tr>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Diagnosa</th>
            <th>Status Data</th>
            <th>Keterangan</th>
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
                    <?php if ($p['tanggal_pelestarian'] == "00-00-0000") : ?>
                        In Aktif
                    <?php else : ?>
                        <?php if ($p['selisih'] >= "1825") : ?>
                            Dilestarikan
                        <?php else : ?>
                            In Aktif
                        <?php endif; ?>
                    <?php endif; ?>
				</td>
                <td><?= $p['keterangan'] ?></td>
                <td>
                    <a href="<?php echo base_url('pelestarian/edit/' . $p['id_pelestarian']) ?>" class="btn btn-warning text-white">Edit</a>
                    <a href="<?php echo base_url('pelestarian/delete/' . $p['id_pelestarian']) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<button href="<?php echo base_url() . "klpcm/input" ?>" class="float-right tombol btn btn-primary">Tambah Data</button>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>#</th>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Status Kelengkapan</th>
        <th>Status Data</th>
        <th>Aksi</th>
    </thead>
    <tfoot>
        <tr>
            <th>#</th>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Status Kelengkapan</th>
            <th>Status Data</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
    <tbody>
        <?php $nomer = 1; ?>
        <?php foreach ($klpcm as $val) { ?>
            <tr>
                <td><?= $nomer; ?></td>
                <td><?php echo $val["no_rm"] ?></td>
                <td><?php echo $val["nama_pasien"] ?></td>
                <td><?php echo $val["jenis_kelamin"] ?></td>
                <td><?php echo $val["tgl_lahir"] ?></td>
                <td><?php echo $val["kelengkapan"] ?></td>
                <td>
                    <?php if ($val['status_data'] == 1) : ?>
                        <div class="btn btn-success">Aktif</div>
                    <?php else : ?>
                        <div class="btn btn-success">Aktif</div>
                    <?php endif; ?>
                </td>
                <td>
                    <button href="<?php echo base_url('klpcm/delete/' . $val['no_rm']) ?>" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus?')"><i class="fa fa-trash sm"></i>Hapus</button>
                    <button href="<?php echo base_url('klpcm/update/' . $val['no_rm']) ?>" class="btn btn-warning"><i class="fa fa-edit sm"></i>Edit</button>
                </td>
            </tr>
            <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>
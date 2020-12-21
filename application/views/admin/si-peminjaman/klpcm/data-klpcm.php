<a href="<?php echo base_url() . "klpcm/input" ?>" class="float-right tombol btn btn-primary">Tambah Data</a>
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
                    <a href="<?php echo base_url('klpcm/delete/' . $val['no_rm']) ?>" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus?')"><i class="fa fa-trash sm"></i>Hapus</a>
                    <a href="<?php echo base_url('klpcm/update/' . $val['no_rm']) ?>" class="btn btn-warning"><i class="fa fa-edit sm"></i>Edit</a>
                    <a class="btn btn-success" onclick="return confirm('Anda akan mengirimkan pesan WhatsApp. Apakah Anda Yakin?')" href="https://wa.me/?text=Pesan%20dari%20Puskesmas%20Jenggawah%20:%20Mengingatkan%20bahwa%20data%20rekam%20medis%20pasien%20dengan%20no%20rm%20<?php echo $val["no_rm"]; ?>,%20Atas%20Nama%20<?php echo $val["nama_pasien"]; ?>%20Tidak%2Lengkap%20.%20Mohon%20harap%20segera%20dilengkapi%20Terima%20Kasih." target="_blank"><i class="fab fa-whatsapp">Kirim Pesan</i></a>
                </td>
            </tr>
            <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>
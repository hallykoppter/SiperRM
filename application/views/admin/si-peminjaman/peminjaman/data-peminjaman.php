<a href="<?php echo base_url() . "peminjaman/input" ?>" class="float-right tombol btn btn-primary">Tambah Data</a>
<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas rm') {
?>
    <a href="<?php echo base_url() . "peminjaman/cetak_tracer" ?>" class="float-right tombol btn btn-warning text-white mr-2">Cetak Tracer</a>
<?php } ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No</th>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Poli yang pinjam</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Pengembalian</th>
        <th>Keterlambatan</th>
        <th>Keterangan</th>
        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas rm') {
        ?>
            <th>Aksi</th>
        <?php } ?>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Poli yang pinjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Pengembalian</th>
            <th>Keterlambatan</th>
            <th>Keterangan</th>
            <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas rm') {
            ?>
                <th>Aksi</th>
            <?php } ?>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $no = 1;
        foreach ($peminjaman as $val) {
            $explode = explode('-', $val["tanggal_pinjam"]);
            $tahun = $explode[0];
            $bulan = $explode[1];
            $tanggal = $explode[2];
            $tgl_pinjam = $tanggal . "/" . $bulan . "/" . $tahun;

        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $val["no_rm"] ?></td>
                <td><?php echo $val["nama_pasien"] ?></td>
                <td><?php echo $val["nama_poli"] ?></td>
                <td><?php echo $val["tanggal_pinjam"] ?></td>
                <td><?php echo $val["tgl_kembali"] ?></td>
                <td><?php echo $val['tgl_pengembalian']; ?></td>
                <td><?php echo $val['keterlambatan'] . " hari"; ?></td>
                <td><?php echo $val['keterangan']; ?></td>
                <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas rm') {
                ?>
                    <td>
                        <a href="<?= base_url('peminjaman-delete/' . $val['id_peminjaman']) ?>" class="badge badge-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash sm"></i></a>
                        <a href="<?= base_url('peminjaman-update/' . $val['id_peminjaman']) ?>" class="badge badge-warning"><i class="fa fa-edit sm"></i></a>
                        <a class="badge badge-success" title="KIRIM PESAN" href="https://wa.me/?text=Pesan%20dari%20Puskesmas%20Jenggawah%20:%20Mengingatkan%20bahwa%20data%20rekam%20medis%20pasien%20dengan%20no%20rm%20<?php echo $val["no_rm"]; ?>,%20Atas%20Nama%20<?php echo $val["nama_pasien"]; ?>%20di%20<?php echo $val["nama_poli"]; ?>%20Tanggal%20Pinjam%20<?php print_r($tgl_pinjam); ?>.%20Mohon%20harap%20segera%20dikembalikan.%20Terima%20Kasih." target="_blank"><i class="fab fa-whatsapp fa-sm"></i></a>
                    </td>
                <?php } ?>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>
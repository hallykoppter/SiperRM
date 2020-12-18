<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas rm') : ?>
    <a href="<?php echo base_url(''); ?>data-rm/input" class="tombolbtm btn btn-primary btn-sm">Tambah Data</a>
<?php endif; ?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No</th>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Tanggal Kunjungan</th>
        <th>Alamat</th>
        <?php if ($this->session->userdata('level') == 'admin') : ?>
            <th>Status Data</th>
            <th>Aksi</th>
        <?php endif; ?>
        <?php if ($this->session->userdata('level') == 'petugas rm' || ($this->session->userdata('level') == 'petugas poli')) : ?>
            <th>Aksi</th>
        <?php endif; ?>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Tanggal Kunjungan</th>
            <th>Alamat</th>
            <?php if ($this->session->userdata('level') == 'admin') : ?>
                <th width="20%">Status Data</th>
                <th>Aksi</th>
            <?php endif; ?>
            <?php if ($this->session->userdata('level') == 'petugas rm' || ($this->session->userdata('level') == 'petugas poli')) : ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $no = 1;

        // Ini fungsi untuk membuat umur

        // function umur($tgl_lahir)
        // {

        //     // ubah ke format Ke Date Time
        //     $lahir = new DateTime($tgl_lahir);
        //     $hari_ini = new DateTime();
        //     if ($lahir == $hari_ini || $lahir == new DateTime("0000-00-00")) {
        //         echo "0 Tahun 0 Bulan 0 Hari";
        //     } else {
        //         $diff = $hari_ini->diff($lahir);

        //         // Display
        //         echo $diff->y . " Tahun";
        //         echo " " . $diff->m . " Bulan";
        //         echo " " . $diff->d . " Hari";
        //     }
        // }

        foreach ($pasien as $item) {
        ?>
            <?php if ($item['status_aktif'] == 1) {
                $style = "";
            } else {
                $style = "class='table-danger'";
            } ?>
            <tr <?= $style; ?>>
                <td><?php echo $no ?></td>
                <td><?php echo $item["no_rm"] ?></td>
                <td><?php echo $item["nama_pasien"] ?></td>
                <td><?php
                    if ($item["jenis_kelamin"] == "L") {
                        echo "Laki-laki";
                    } else {
                        echo "Perempuan";
                    }

                    ?>
                </td>
                <td><?php echo $item["tgl_lahir"] ?></td>
                <td><?= $item['tanggal_pinjam'] ?></td>
                <td><?php echo $item["alamat"] ?></td>
                <?php if ($this->session->userdata('level') == 'admin') : ?>
                    <td width="20%">
                        <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                            <button type="button" data-urut="<?= $item['no_urut'] ?>" data-status="0" class="changeStatusRM btn btn-sm btn-<?= $item['status_aktif'] == 0 ? 'danger' : 'default' ?>">Inaktif</button>
                            <button type="button" data-urut="<?= $item['no_urut'] ?>" data-status="1" class="changeStatusRM btn btn-sm btn-<?= $item['status_aktif'] == 1 ? 'success' : 'default' ?>">Aktif</button>
                        </div>

                    </td>
                    <td>
                        <?php if ($item['status_aktif'] == 0) : ?>
                            <a href="<?php echo base_url("data-rm/edit/") . $item["no_urut"] ?>" class="badge badge-primary"><span class="fas fa-edit fa-sm"> Edit</span></a>
                            <a href="<?php echo base_url("retensi-add/") . $item["no_rm"] ?>" class="badge badge-warning"><span class="fas fa-align-justify fa-sm"> Retensi</span></a>
                            <button data-toggle="modal" data-target="#delete<?= $item['no_urut']; ?>" class="badge badge-danger"><span class="fas fa-trash-alt fa-sm"> Hapus</span></button>
                            <a href="<?php echo base_url("data-rm/qrcode/") . $item["no_urut"] ?>" class="badge badge-success"><span class="fas fa-qrcode fa-sm"> QR Code</span></a>
                            <a title="KIRIM PESAN" onclick="return confirm('Anda akan mengirimkan pesan WhatsApp. Apakah Anda Yakin?')" href="https://wa.me/?text=Pesan%20dari%20SIPER-RM%20Puskesmas%20Jenggawah%20:%20Mengingatkan%20bahwa%20data%20rekam%20medis%20pasien%20dengan%20no%20rm%20<?php echo $item["no_rm"]; ?>,%20Atas%20Nama%20<?php echo $item["nama_pasien"]; ?>%20sudah%20waktunya%20diretensi.%20Mohon%20harap%20segera%20diretensi.%20Terima%20Kasih." target="_blank" class="badge badge-success"><i class="fab fa-whatsapp"> WA</i></a>
                        <?php else : ?>
                            <a href="<?php echo base_url("data-rm/edit/") . $item["no_urut"] ?>" class="badge badge-primary"><span class="fas fa-edit fa-sm"> Edit</span></a>
                            <button data-toggle="modal" data-target="#delete<?= $item['no_urut']; ?>" class="badge badge-danger"><span class="fas fa-trash-alt fa-sm"> Hapus</span></button>
                            <a href="<?php echo base_url("data-rm/qrcode/") . $item["no_urut"] ?>" class="badge badge-success"><span class="fas fa-qrcode fa-sm"> QR Code</span></a>
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
                <?php if ($this->session->userdata('level') == 'petugas rm') : ?>
                    <td>
                        <?php if ($item['status_aktif'] == 0) : ?>
                            <a href="<?php echo base_url("data-rm/edit/") . $item["no_urut"] ?>" class="badge badge-primary"><span class="fas fa-edit fa-sm"> Edit</span></a>
                            <a href="<?php echo base_url("data-rm/retensi/") . $item["no_urut"] ?>" class="badge badge-warning"><span class="fas fa-align-justify fa-sm"> Retensi</span></a>
                            <button data-toggle="modal" data-target="delete<?= $item['no_urut']; ?>" class="badge badge-danger"><span class="fas fa-trash-alt fa-sm"> Hapus</span></button>
                            <a href="<?php echo base_url("data-rm/qrcode/") . $item["no_urut"] ?>" class="badge badge-success"><span class="fas fa-qrcode fa-sm"> QR Code</span></a>
                            <a title="KIRIM PESAN" onclick="return confirm('Anda akan mengirimkan pesan WhatsApp. Apakah Anda Yakin?')" href="https://wa.me/?text=Pesan%20dari%20SIPER-RM%20Puskesmas%20Jenggawah%20:%20Mengingatkan%20bahwa%20data%20rekam%20medis%20pasien%20dengan%20no%20rm%20<?php echo $item["no_rm"]; ?>,%20Atas%20Nama%20<?php echo $item["nama_pasien"]; ?>%20sudah%20waktunya%20diretensi.%20Mohon%20harap%20segera%20diretensi.%20Terima%20Kasih." target="_blank" class="badge badge-success"><i class="fab fa-whatsapp"> WA</i></a>
                        <?php else : ?>
                            <a href="<?php echo base_url("data-rm/edit/") . $item["no_urut"] ?>" class="badge badge-primary"><span class="fas fa-edit fa-sm"> Edit</span></a>
                            <button data-toggle="modal" data-target="#delete<?= $item['no_urut']; ?>" class="badge badge-danger"><span class="fas fa-trash-alt fa-sm"> Hapus</span></button>
                            <a href="<?php echo base_url("data-rm/qrcode/") . $item["no_urut"] ?>" class="badge badge-success"><span class="fas fa-qrcode fa-sm"> QR Code</span></a>
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
                <?php if ($this->session->userdata('level') == 'petugas poli') : ?>
                    <td>
                        <a href="<?php echo base_url("data-rm/qrcode/") . $item["no_urut"] ?>" class="badge badge-success"><span class="fas fa-qrcode fa-sm"> QR Code</span></a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>




<!-- ini modal delete -->
<!-- Modal -->
<?php foreach ($pasien as $item) : ?>
    <div class="modal fade" id="delete<?= $item['no_urut']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete<?= $item['no_urut']; ?>Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data?
                    <br>
                    No RM = <?= $item['no_rm']; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a type="button" class="btn btn-primary" href="<?= base_url('data-rm/delete/') . $item['no_urut']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal delete -->
<?php endforeach; ?>
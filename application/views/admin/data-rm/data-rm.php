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
        <th>Umur</th>
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
            <th>Umur</th>
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
        function umur($tgl_lahir)
        {

            // ubah ke format Ke Date Time
            $lahir = new DateTime($tgl_lahir);
            $hari_ini = new DateTime();
            if ($lahir == $hari_ini || $lahir == new DateTime("0000-00-00")) {
                echo "0 Tahun 0 Bulan 0 Hari";
            } else {
                $diff = $hari_ini->diff($lahir);

                // Display
                echo $diff->y . " Tahun";
                echo " " . $diff->m . " Bulan";
                echo " " . $diff->d . " Hari";
            }
        }

        foreach ($pasien as $item) {
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $item["no_rm"] ?></td>
                <td><?php echo $item["nama_pasien"] ?></td>
                <td><?php
                    if ($item["jenis_kelamin"] == "L") {
                        echo "Laki-laki";
                    } else {
                        echo "Perempuan";
                    }

                    ?></td>
                <td><?php echo $item["tgl_lahir"] ?></td>
                <td>
                    <?php
                    umur($item["tgl_lahir"]);
                    ?>
                </td>
                <td><?php echo $item["alamat"] ?></td>
                <?php if ($this->session->userdata('level') == 'admin') : ?>
                    <td width="20%">
                        <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                            <button type="button" data-urut="<?= $item['no_urut'] ?>" data-status="0" class="changeStatusRM btn btn-sm btn-<?= $item['status_aktif'] == 0 ? 'danger' : 'default' ?>">Nonaktif</button>
                            <button type="button" data-urut="<?= $item['no_urut'] ?>" data-status="1" class="changeStatusRM btn btn-sm btn-<?= $item['status_aktif'] == 1 ? 'success' : 'default' ?>">Aktif</button>
                        </div>

                    </td>
                    <td>
                        <a href="<?php echo base_url("data-rm/edit/") . $item["no_urut"] ?>" class="badge badge-primary"><span class="fas fa-edit fa-sm"></span></a>
                        <a href="<?php echo base_url("data-rm/delete/") . $item["no_urut"] ?>" class="badge badge-danger"><span class="fas fa-delete fa-sm"></span></a>
                        <a href="<?php echo base_url("data-rm/qrcode/") . $item["no_urut"] ?>" class="badge badge-success"><span class="fas fa-qrcode fa-sm"></span></a>
                    </td>
                <?php endif; ?>
                <?php if ($this->session->userdata('level') == 'petugas rm') : ?>
                    <td>
                        <a href="<?php echo base_url("data-rm/edit/") . $item["no_urut"] ?>" class="badge badge-primary"><span class="fas fa-edit fa-sm"></span></a>
                        <a href="<?php echo base_url("data-rm/delete/") . $item["no_urut"] ?>" class="badge badge-danger"><span class="fas fa-delete fa-sm"></span></a>
                        <a href="<?php echo base_url("data-rm/qrcode/") . $item["no_urut"] ?>" class="badge badge-success"><span class="fas fa-qrcode fa-sm"></span></a>
                    </td>
                <?php endif; ?>
                <?php if ($this->session->userdata('level') == 'petugas poli') : ?>
                    <td>
                        <a href="<?php echo base_url("data-rm/qrcode/") . $item["no_urut"] ?>" class="badge badge-success"><span class="fas fa-qrcode fa-sm"></span></a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>
<a href="<?php echo base_url()."peminjaman/input"?>" class="float-right tombol btn btn-primary">Tambah Data</a>
<table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No</th>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Pelayanan</th>
        <th>Jenis Pelayanan</th>
        <th>TGL Peminjaman</th>
        <th>TGL Kembali</th>
        <th>Keterlambatan</th>
        <th>Aksi</th>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Pelayanan</th>
            <th>Jenis Pelayanan</th>
            <th>TGL Peminjaman</th>
            <th>TGL Kembali</th>
            <th>Keterlambatan</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
    <tbody>
    <?php 
    $no = 1;
    foreach($pengembalian as $val){?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $val["id_permintaan"]?></td>
            <td><?php echo $val["no_rm"]?></td>
            <td><?php echo $val["nama_pasien"]?></td>
            <td><?php echo $val["pelayanan"]?></td>
            <td><?php echo $val["jenis_pelayanan"]?></td>
            <td><?php echo $val["tanggal_pinjam"]?></td>
            <td>
            <?php
                // $tanggalSekarang = new DateTime();
                // $tanggalPeminjaman = new DateTime($val["tanggal_pinjam"]);
                // $keterlambatan = $tanggalSekarang->diff($tanggalPinjam)->days + 1;
            ?>
            </td>
            <td><a href="" class="btn btn-danger"><i class="fas fa-trash sm"></i></a></td>
        </tr>
            <?php 
            $no++;
            } 
            ?>
    </tbody>
</table>
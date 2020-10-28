<h2>Filter</h2>
<form action="" method="post">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <label for="dari">Dari</label>
                <?php if (isset($dari)) : ?>
                    <input type="date" name="dari" id="dari" class="form-control" value="<?= $dari; ?>">
                <?php else : ?>
                    <input type="date" name="dari" id="dari" class="form-control">
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <label for="sampai">Sampai</label>
                <?php if (isset($sampai)) : ?>
                    <input type="date" name="sampai" id="sampai" class="form-control" value="<?= $sampai; ?>">
                <?php else : ?>
                    <input type="date" name="sampai" id="sampai" class="form-control">
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php if (isset($sampai)) : ?>
                    <input type="text" name="nama_kepala" class="form-control" placeholder="Nama Kepala Puskesmas" value="<?= $nama_kepala ?>">
                <?php else : ?>
                    <input type="text" name="nama_kepala" class="form-control" placeholder="Nama Kepala Puskesmas" required>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <button type="submit" name="filter" class="btn btn-primary">Filter</button>
    <button type="submit" name="print" class="btn btn-warning text-white">Print</button>
</form>
<br><br>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <th>No RM</th>
        <th>Nama Pasien</th>
        <th>Poli yang dituju</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Tanggal Pengembalian</th>
        <th>Keterangan</th>
        <th>Kelengkapan</th>
    </thead>
    <tfoot>
        <tr>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Poli yang dituju</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Tanggal Pengembalian</th>
            <th>Keterangan</th>
            <th>Kelengkapan</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($peminjaman as $p) : ?>
            <tr>
                <td><?= $p['no_rm'] ?></td>
                <td><?= $p['nama_pasien'] ?></td>
                <td><?= $p['nama_poli'] ?></td>
                <td><?= $p['tanggal_pinjam'] ?></td>
                <td><?= $p['tgl_kembali'] ?></td>
                <td><?= $p['tgl_pengembalian'] ?></td>
                <td><?= $p['keterangan'] ?></td>
                <td><?= $p['kelengkapan'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
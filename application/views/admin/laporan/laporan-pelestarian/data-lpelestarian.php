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
        <th>Diagnosa</th>
        <th>Tanggal Kunjungan</th>
        <th>Tanggal Pelestarian</th>
        <th>Keterangan</th>
    </thead>
    <tfoot>
        <tr>
            <th>No RM</th>
            <th>Diagnosa</th>
            <th>Tanggal Kunjungan</th>
            <th>Tanggal Pelestarian</th>
            <th>Keterangan</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($cetak as $c) : ?>
            <tr>
                <td><?= $c['no_rm'] ?></td>
                <td><?= $c['diagnosa'] ?></td>
                <td><?= $c['tanggal_kunjungan'] ?></td>
                <td><?= $c['tanggal_pelestarian'] ?></td>
                <td><?= $c['keterangan'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
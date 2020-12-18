<form action="<?= base_url('jadwal-retensi/update') ?>" method="post">
    <div class="form-group">
        <label>Jadwal Retensi</label>
        <input type="date" class="form-control" name="tanggal" value="<?= $jadwal['tanggal'] ?>">
        <input type="hidden" name="id_jadwal" value="<?= $jadwal['id_jadwal'] ?>">
    </div>
    <button class="tomboltop btn btn-info" type="submit">SIMPAN</button>
</form>
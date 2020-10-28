<form action="<?= base_url('penanggungjawab-poli/insert') ?>" method="post">
    <div class="form-group">
        <label>NAMA Penanggung Jawab</label>
        <input type="text" class="form-control" name="nama_penanggungjawab">
    </div>
    <div class="form-group">
        <label>Poli</label>
        <select name="id_poli" class="form-control">
            <option>--Pilih Poli--</option>
            <?php foreach ($poli as $p) : ?>
                <option value="<?= $p['id_poli'] ?>"><?= $p['nama_poli']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button class="tomboltop btn btn-success" type="submit">TAMBAH</button>
</form>
<form action="<?= base_url('penanggungjawab-poli/update') ?>" method="post">
    <input type="hidden" name="id_penanggungjawab" value="<?= $penanggungjawabpoli['id_penanggungjawab'] ?>">
    <div class="form-group">
        <label>Nama Penanggung Jawab</label>
        <input type="text" class="form-control" name="nama_penanggungjawab" value="<?= $penanggungjawabpoli['nama_penanggungjawab'] ?>">
    </div>
    <div class="form-group">
        <label>Poli</label>
        <select name="id_poli" class="form-control">
            <option>--Pilih Poli--</option>
            <?php foreach ($poli as $p) : ?>
                <?php if ($p['id_poli'] == $penanggungjawabpoli['id_poli']) : ?>
                    <option value="<?= $p['id_poli'] ?>" selected><?= $p['nama_poli']; ?></option>
                <?php else : ?>
                    <option value="<?= $p['id_poli'] ?>"><?= $p['nama_poli']; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
	
    <button class="tomboltop btn btn-success" type="submit">Ubah</button>
</form>
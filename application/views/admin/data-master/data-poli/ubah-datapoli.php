<form action="<?= base_url("poli/update") ?>" method="post">
    <div>
        <label>NAMA POLI</label>
        <input type="text" class="form-control" name="nama_poli" value="<?= $poli['nama_poli'] ?>">
        <input type="hidden" name="id_poli" value="<?= $poli['id_poli'] ?>">
    </div>
    <button class="tomboltop btn btn-info" type="submit">UBAH</button>
</form>
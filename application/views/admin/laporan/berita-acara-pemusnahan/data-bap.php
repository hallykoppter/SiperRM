<form action="<?= base_url('bap_print'); ?>" method="post">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label><b>Pelaksanaan</b></label>
                <input type="text" name="hari" class="form-control" placeholder="Hari" required>
                <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
                <input type="text" name="waktu" class="form-control" placeholder="Waktu" required>
                <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><b>Tim Retensi dan Pemusnahan</b></label>
                <input type="text" name="pelaksana1" class="form-control" placeholder="Pelaksana 1" required>
                <input type="text" name="pelaksana2" class="form-control" placeholder="Pelaksana 2" required>
                <input type="text" name="pelaksana3" class="form-control" placeholder="Pelaksana 3">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label><b>Persetujuan</b></label>
                <input type="text" name="sekretaris" class="form-control" placeholder="Sekretaris" required>
                <input type="text" name="ketua" class="form-control" placeholder="Ketua" required>
                <input type="text" name="kepala_pkm" class="form-control" placeholder="Kepala Puskesmas" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label style="color : white"><b>NIP</b></label>
                <input type="text" name="nip_sekretaris" class="form-control" placeholder="NIP Sekretaris">
                <input type="text" name="nip_ketua" class="form-control" placeholder="NIP Ketua">
                <input type="text" name="nip_kepala" class="form-control" placeholder="NIP Kepala Puskesmas" required>
            </div>
        </div>
    </div>
    <button type="submit" name="print" class="btn btn-warning text-white">Print</button>
</form>
</table>
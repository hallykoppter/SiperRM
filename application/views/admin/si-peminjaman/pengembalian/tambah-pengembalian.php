<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url()."peminjaman"?>" class="float-right tombol btn btn-primary">Kembali</a>
    </div>
    <div class="col-md-12">
        <form action="<?php echo base_url()."klcpm/insert"?>" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">No Rekam Medis</label>
                        <input type="text" class="form-control" name="no_rm" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="">Nama Pasien</label>
                        <input type="text" class="form-control" name="nama_pasien" value="" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="">Pelayanan</label>
                        <select class="form-control selectpicker" data-live-search="true" name="Pelayanan" id="">
                            <option>---Pilih Data---</option>
                            <option>Kuda</option>
                            <option>Jerapah</option>
                            <option>Rusa</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Jenis Pelayanan</label>
                        <select class="form-control selectpicker" data-live-search="true" name="jenis_pelayanan" id="">
                            <option>---Pilih Data---</option>
                            <option>Kuda</option>
                            <option>Jerapah</option>
                            <option>Rusa</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tanggal_pinjam" value="<?php $tglSkr = date("Y-m-d"); echo $tglSkr;?>">
                    </div>
                    <div class="col-md-6">
                        <label for="">Dokter</label>
                        <select class="form-control selectpicker" data-live-search="true" name="no_sip" id="">
                            <option>---Pilih Data---</option>
                            <option>Kuda</option>
                            <option>Jerapah</option>
                            <option>Rusa</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Masukan Password</label>
                        <input type="password" class="form-control" name="tanggal_pinjam" value="">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
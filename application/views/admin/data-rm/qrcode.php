<div class="card" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <?php

            use Endroid\QrCode\LabelAlignment;

            $qrCode = new Endroid\QrCode\QrCode($QR['no_rm']);
            $qrCode->setSize(300);
            $qrCode->writeFile('uploads/qr-code/' . $QR['no_rm'] . '.png');
            ?>
            <img src="<?= base_url('uploads/qr-code/' . $QR['no_rm'] . '.png') ?>" class="card-img mt-4 ml-2" alt="">
        </div>
        <div class="col-md-8">

            <div class="card-body">
                <div class="form-group row">
                    <label for="no_rm" class="col-sm-4 col-form-label pt-1">No RM</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_rm" value="<?= $QR['no_rm']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label pt-1">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" value="<?= $QR['nama_pasien']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label pt-1">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat" value="<?= $QR['alamat']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-4 col-form-label pt-1">Tgl Lahir</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="tgl_lahir" value="<?= $QR['tgl_lahir']; ?>" readonly>
                    </div>
                </div>
                <!-- <h5 class="card-title"> <?= $QR['no_rm'] ?></h5>
                <p class="card-text">Nama : <?= $QR['nama_pasien'] ?></p>
                <p class="card-text">Alamat : <?= $QR['alamat'] ?></p>
                <p class="card-text">Tglahir: <?= $QR['tgl_lahir'] ?></p> -->
            </div>
        </div>
    </div>
</div>
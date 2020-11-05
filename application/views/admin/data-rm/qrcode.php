<div class="card" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <?php

            use Endroid\QrCode\LabelAlignment;

            $qrCode = new Endroid\QrCode\QrCode($QR['no_rm']);
            $qrCode->setSize(300);
            $qrCode->writeFile('uploads/qr-code/' . $QR['no_rm'] . '.png');
            ?>
            <img src="<?= base_url('uploads/qr-code/' . $QR['no_rm'] . '.png') ?>" class="card-img" alt="">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"> <?= $QR['no_rm'] ?></h5>
                <p class="card-text">Nama : <?= $QR['nama_pasien'] ?></p>
                <p class="card-text">Alamat : <?= $QR['alamat'] ?></p>
                <p class="card-text">Tglahir: <?= $QR['tgl_lahir'] ?></p>
            </div>
        </div>
    </div>
</div>
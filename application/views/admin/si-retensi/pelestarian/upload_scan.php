<!-- <div class="card-group card text-white bg-success" style="max-width: 540px;">
    <div class="card-body">
        <h5 class="card-title"><?= $hasilscan[0]['no_rm']; ?></h5>
        <p class="card-text"><?= $hasilscan[0]['keterangan']; ?> DENGAN DIAGNOSA <?= $hasilscan[0]['diagnosa']; ?> DILESTARIKAN PADA TANGGAL <?= $hasilscan[0]['tanggal_pelestarian']; ?></p>
        <p class="card-text"><small class="text-white">KUNJUNGAN TERAKHIR <?= $hasilscan[0]['tanggal_kunjungan']; ?></small></p>
        <img src="<?= base_url('uploads/scans/') . $hasilscan[0]['image']; ?>" class="card-img" alt="card-img cap">
    </div> -->
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <!-- <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"><?= $hasilscan[0]['no_rm']; ?></div>
                <div class="card-body text-primary">
                    <h5 class="card-title"><?= $hasilscan[0]['diagnosa']; ?></h5>
                    <p class="card-text">TERAKHIR BERKUNJUNG PADA <?= $hasilscan[0]['tanggal_kunjungan']; ?> DAN DILESTARIKAN PADA <?= $hasilscan[0]['tanggal_pelestarian']; ?></p>
                </div>
            </div> -->
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Nomor RM : <?= $hasilscan[0]['no_rm']; ?></div>
                <div class="card-body">
                    <h5 class="card-title">Diagnosa : <?= $hasilscan[0]['diagnosa']; ?></h5>
                    <p class="card-text">Terakhir berkunjung : <?= $hasilscan[0]['tanggal_kunjungan']; ?></p>
                    <p class="card-text"> Dilestarikan : <?= $hasilscan[0]['tanggal_pelestarian']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <img src="<?= base_url('uploads/pelestarian/') . $hasilscan[0]['image']; ?>" class="card-img" alt="card-img cap">
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">Nomor RM : <?= $hasilscan[0]['no_rm']; ?></div>
                <div class="card-body">
                    <h5 class="card-title">Diagnosa : <?= $hasilscan[0]['diagnosa']; ?></h5>
                    <p class="card-text">Terakhir berkunjung : <?php echo date('d M Y', strtotime($hasilscan[0]['tanggal_kunjungan'])); ?></p>
                    <p class="card-text"> Dimusnahkan : <?php echo date('d M Y', strtotime($hasilscan[0]['tanggal_pemusnahan'])); ?></p>
                </div>
            </div>
            <!-- <a title="Hapus" href="<?php echo base_url('pemusnahan/deletescan/' . $hasilscan[0]['id_pelestarian']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a> -->
        </div>
        <div class="col-sm-8">
            <img src="<?= base_url('uploads/pemusnahan/') . $hasilscan[0]['image']; ?>" class="card-img" alt="card-img cap">
        </div>
    </div>
</div>
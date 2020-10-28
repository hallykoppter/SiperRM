<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body"><?= $jadwal ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <span class="small text-white stretched-link">Jadwal Retensi</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body"><?= $peminjaman ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <span class="small text-white stretched-link">Peminjaman</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body"><?= $terlambat ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <span class="small text-white stretched-link">Terlambat</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body"><?= $tidak_lengkap ?></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <span class="small text-white stretched-link">Data Tidak Lengkap</span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4>Jadwal Retensi</h4>
            </div>
            <div class="card-body">
                <p><?= date("d F Y", strtotime($tanggal_jadwal)); ?></p>
            </div>
        </div>
    </div>
</div> <br>
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar mr-1"></i>
                Peminjaman Tahun Ini
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <!-- <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar mr-1"></i>
                Bar Chart Example
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div> -->
</div>
<div class="col-lg-4 col-sm-6">
    <div class="card card-border-shadow-primary h-100">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <div class="avatar me-4">
                    <span class="avatar-initial rounded bg-label-primary"><i class="fa-solid fa-users"></i></span>
                </div>
                <h4 class="mb-0"><?= $totalPelanggan ?></h4>
            </div>
            <p class="mb-1">Total Pelanggan</p>
            <p class="mb-0">
                <small class="text-muted">Jumlah Keseluruhan</small>
            </p>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6">
    <div class="card card-border-shadow-warning h-100">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <div class="avatar me-4">
                    <span class="avatar-initial rounded bg-label-warning"><i class="fa-solid fa-chart-simple"></i></span>
                </div>
                <h4 class="mb-0"><?= number_format($totalPemakaianBulanIni, 2, ',', '.') ?></h4>
            </div>
            <p class="mb-1">Total Pemakaian Bulan Ini</p>
            <p class="mb-0">
                <small class="text-muted">Volume Pemakaian</small>
            </p>
        </div>
    </div>
</div>
<div class="col-lg-4 col-sm-6">
    <div class="card card-border-shadow-info h-100">
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <div class="avatar me-4">
                    <span class="avatar-initial rounded bg-label-info"><i class="fa-solid fa-user"></i></span>
                </div>
                <h4 class="mb-0"><?= $jumlahPelangganPemakaian ?></h4>
            </div>
            <p class="mb-1">Pelanggan Pemakaian</p>
            <p class="mb-0">
                <small class="text-muted">Jumlah Pelanggan Aktif</small>
            </p>
        </div>
    </div>
</div>
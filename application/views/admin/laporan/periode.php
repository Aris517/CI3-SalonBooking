<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Laporan Periode</h5>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('laporan/cetak_periode') ?>" target="_blank" method="post">
                        <div class="row mb-3">
                            <label class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" name="dari" required>
                        </div>
                        <div class="row mb-3">
                            <label class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="sampai" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Laporan Kategori</h5>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('laporan/cetak_kategori') ?>" target="_blank" method="post">
                        <div class="row mb-3">
                            <label class="form-label">Jenis Layanan</label>
                            <select class="form-select" name="opsi" required>
                                <option value="">Menu Layanan</option>
                                <option value="sewa">Sewa Baju</option>
                                <option value="booking">Booking MUA</option>
                            </select>
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
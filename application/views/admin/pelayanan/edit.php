<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Edit Pelayanan</h5>
                <a href="<?= base_url('pelayanan') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('pelayanan/proses_edit/' . $pelayanan->id) ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Tipe Pelayanan</label>
                            <input type="text" class="form-control" name="pelayanan" value="<?= $pelayanan->pelayanan ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Pelayanan</label>
                            <input type="number" class="form-control" name="harga" value="<?= $pelayanan->harga_layanan ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required><?= $pelayanan->deskripsi ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
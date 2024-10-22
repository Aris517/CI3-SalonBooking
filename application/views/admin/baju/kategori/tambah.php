<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Tambah Kategori Baju</h5>
                <a href="<?= base_url('baju/kategori') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('baju/proses_tambah_kategori') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Kategori Baju</label>
                            <input type="text" class="form-control" name="kategori" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
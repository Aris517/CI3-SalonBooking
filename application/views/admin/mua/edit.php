<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Edit MUA</h5>
                <a href="<?= base_url('mua') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('mua/proses_edit/' . $mua->id) ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Kategori MUA</label>
                            <input type="text" class="form-control" name="mua" value="<?= $mua->kategori_mua ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" value="<?= $mua->harga ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required><?= $mua->deskripsi ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
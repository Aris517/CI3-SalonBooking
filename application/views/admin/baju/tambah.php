<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Tambah Data Baju</h5>
                <a href="<?= base_url('baju') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('baju/proses_tambah') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nama Baju</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori Baju</label>
                            <select class="form-select" name="kategori" required>
                                <option value="">Pilih kategori</option>
                                <?php foreach ($kategori as $row) : ?>
                                    <option value="<?= $row->id ?>"><?= $row->kategori_baju ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Sewa</label>
                            <input type="number" class="form-control" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" accept=".gif, .jpg, .jpeg, .png" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
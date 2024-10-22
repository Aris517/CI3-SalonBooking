<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Tambah Data Baju</h5>
                <a href="<?= base_url('baju') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('baju/proses_edit/' . $baju->id) ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Nama Baju</label>
                            <input type="text" class="form-control" name="nama" value="<?= $baju->nama_baju ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori Baju</label>
                            <select class="form-select" name="kategori" required>
                                <option value="">Pilih kategori</option>
                                <?php foreach ($kategori as $row) : ?>
                                    <option value="<?= $row->id ?>" <?= $row->id == $baju->id_kategori_baju ? 'selected' : '' ?>>
                                        <?= $row->kategori_baju ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Sewa</label>
                            <input type="number" class="form-control" name="harga" value="<?= $baju->harga_sewa ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" value="<?= $baju->stok ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" accept=".gif, .jpg, .jpeg, .png" name="foto">
                            <div class="form-text text-info text-end">Tidak perlu memasukan file jika foto tidak diubah</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
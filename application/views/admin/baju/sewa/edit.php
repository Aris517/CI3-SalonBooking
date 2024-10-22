<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Edit Sewa Baju</h5>
                <a href="<?= base_url('baju/sewa') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('baju/proses_sewa_edit/' . $sewa->id) ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Baju</label>
                            <input type="hidden" name="bj" value="<?= $sewa->id_baju ?>" disabled>
                            <select class="form-select" name="baju" disabled>
                                <option value="">Menu Baju</option>
                                <?php foreach ($baju as $row) : ?>
                                    <option value="<?= $row->id ?>" <?= $row->id == $sewa->id_baju ? 'selected' : '' ?>><?= $row->nama_baju ?></option>
                                <?php endforeach ?>
                            </select>
                            <input type="hidden" name="baju" value="<?= $sewa->id_baju ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $sewa->nama ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" value="<?= $sewa->no_hp ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat" required><?= $sewa->alamat ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Untuk Tanggal</label>
                            <input type="date" class="form-control" name="untuk_tgl" value="<?= $sewa->untuk_tgl ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Baju</label>
                            <input type="hidden" class="form-control" name="jb" value="<?= $sewa->jml_baju ?>" readonly>
                            <input type="number" class="form-control" name="jml_baju" value="<?= $sewa->jml_baju ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Layanan</label>
                            <select class="form-select" name="layanan" required>
                                <option value="">Menu Layanan</option>
                                <?php foreach ($pelayanan as $row) : ?>
                                    <option value="<?= $row->id ?>" <?= $row->id == $sewa->id_pelayanan ? 'selected' : '' ?>><?= $row->pelayanan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
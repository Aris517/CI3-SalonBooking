<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Edit Booking MUA</h5>
                <a href="<?= base_url('mua/booking') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('mua/proses_booking_edit/' . $booking->id) ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Jenis Layanan</label>
                            <select class="form-select" disabled>
                                <option value="">Menu MUA</option>
                                <?php foreach ($mua as $row) : ?>
                                    <option value="<?= $row->id ?>" <?= $row->id == $booking->id_mua ? 'selected' : '' ?>><?= $row->kategori_mua ?></option>
                                <?php endforeach ?>
                            </select>
                            <input type="hidden" name="mua" value="<?= $booking->id_mua ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $booking->nama ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" value="<?= $booking->no_hp ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" name="alamat" required><?= $booking->alamat ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Untuk Tanggal</label>
                            <input type="date" class="form-control" name="untuk_tgl" value="<?= $booking->untuk_tgl ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Orang</label>
                            <input type="number" class="form-control" name="jml_orang" value="<?= $booking->jml_orang ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Layanan</label>
                            <select class="form-select" name="layanan" required>
                                <option value="">Menu Layanan</option>
                                <?php foreach ($pelayanan as $row) : ?>
                                    <option value="<?= $row->id ?>" <?= $row->id == $booking->id_pelayanan ? 'selected' : '' ?>><?= $row->pelayanan ?></option>
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
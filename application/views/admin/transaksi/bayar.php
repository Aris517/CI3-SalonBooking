<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-4">
                <h5 class="card-title fw-semibold">Form Pembayaran</h5>
                <a href="<?= base_url('transaksi') ?>" class="btn btn-sm btn-warning ms-4">Kembali</a>
            </div>
            <div class="card">
                <div class="card-body p-4">
                    <form action="<?= base_url('transaksi/proses') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Tipe</label>
                            <input type="text" class="form-control" name="tipe" value="<?= $tipe ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Transaksi</label>
                            <input type="text" class="form-control" value="<?= $tipe == 'booking' ? 'MUA ' . $data->kategori_mua : 'Sewa Baju ' . $data->nama_baju ?>" disabled>
                            <input type="hidden" name="id_tipe" value="<?= $data->id ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="text" class="form-control" value="<?= $tipe == 'booking' ? $data->jml_orang : $data->jml_baju ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $data->nama ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total</label>
                            <input type="text" class="form-control" value="<?= number_format($data->total, 0, ',', '.') ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bayar</label>
                            <input type="number" class="form-control" name="bayar" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kembalian</label>
                            <input type="number" class="form-control" name="kembalian" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Transaksi</label>
                            <input type="date" class="form-control" name="tgl_trans" value="<?= date('Y-m-d') ?>" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
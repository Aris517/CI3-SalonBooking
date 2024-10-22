<!-- Header Start -->
<div class="container-fluid bg-breadcrumb py-5">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mb-4">Sewa Baju</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item active text-white"><a href="<?= base_url('visitor/baju') ?>">Sewa Baju</a></li>
            <li class="breadcrumb-item active text-white">Form <Datag></Datag>
            </li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Gallery Start -->
<div class="container-fluid gallery py-5">
    <div class="container py-5">
        <h3 class="mb-3">Form Sewa Baju</h3>
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <img class="img-fluid rounded w-100" id="foto" src="" alt="">
            </div>
        </div>
        <form action="<?= base_url('baju/proses_sewa') ?>" method="post">
            <input type="hidden" name="id" value="<?= $baju->id ?>" readonly>
            <input type="hidden" name="harga" value="<?= $baju->harga_sewa ?>" readonly>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label class="form-label">No hp</label>
                <input type="text" class="form-control" name="no_hp" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea type="text" class="form-control" name="alamat" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Untuk Tanggal</label>
                <input type="date" class="form-control" name="untuk_tgl" required>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Jumlah Baju</label>
                    <input type="number" class="form-control" name="jml_baju" required>
                </div>
                <div class="col">
                    <label class="form-label">Jenis Layanan</label>
                    <select class="form-select" name="layanan" required>
                        <option value="">Menu Layanan</option>
                        <?php foreach ($pelayanan as $row) : ?>
                            <option value="<?= $row->id ?>"><?= $row->pelayanan ?> | +Rp <?= $row->harga_layanan ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Sewa</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- gallery End -->
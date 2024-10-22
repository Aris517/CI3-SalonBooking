<!-- Header Start -->
<div class="container-fluid bg-breadcrumb py-5">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mb-4">Daftar Rias</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active text-white">Booking MUA</li>
        </ol>
    </div>
</div>
<!-- Header End -->


<!-- Pricing Start -->
<div class="container-fluid pricing py-5" style="background: var(--bs-primary);">
    <div class="container py-5">
        <?= $this->session->flashdata('pesan') ?>
        <div class="owl-carousel pricing-carousel">
            <?php foreach ($mua as $row) : ?>
                <div class="pricing-item">
                    <div class="rounded pricing-content">
                        <div class="bg-light rounded-top border-3 border-bottom border-primary p-4">
                            <h5 class="text-primary text-uppercase m-0"><?= $row->kategori_mua ?></h5>
                            <h1 class="display-4 mb-0">
                                <small class="align-top text-muted" style="font-size: 22px; line-height: 45px;">Rp</small><?= number_format($row->harga, 0, ',', '.') ?></small>
                            </h1>
                        </div>
                        <div class="p-4">
                            <p><?= $row->deskripsi ?></p>
                            <?php if (!empty($this->session->userdata('email'))) : ?>
                                <button data-bs-target="#booking" data-bs-toggle="modal" data-bs-id="<?= $row->id ?>" data-bs-harga="<?= $row->harga ?>" class="btn btn-primary btn-primary-outline-0 rounded-pill my-2 px-4">Booking</button>
                            <?php else : ?>
                                <a href="<?= base_url('auth/login') ?>" class="btn btn-primary btn-primary-outline-0 rounded-pill my-2 px-4">Booking</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Pricing End -->

<div class="modal fade" id="booking" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-4">
                <h3 class="mb-3">Form Booking MUA</h3>
                <form action="<?= base_url('mua/proses_booking') ?>" method="post">
                    <input type="hidden" name="id" id="id" value="" readonly>
                    <input type="hidden" name="harga" id="harga" value="" readonly>
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
                            <label class="form-label">Jumlah Orang</label>
                            <input type="number" class="form-control" name="jml_orang" required>
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
                        <button type="submit" class="btn btn-primary">Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const booking = document.getElementById('booking')
    if (booking) {
        booking.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const id = button.getAttribute('data-bs-id')
            const harga = button.getAttribute('data-bs-harga')

            const dataId = booking.querySelector('.modal-body form #id')
            const dataHarga = booking.querySelector('.modal-body form #harga')

            dataId.value = id
            dataHarga.value = harga
        })
    }
</script>
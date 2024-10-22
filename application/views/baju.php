<!-- Header Start -->
<div class="container-fluid bg-breadcrumb py-5">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mb-4">Daftar Baju Disewakan</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item active text-white">Sewa Baju</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- Gallery Start -->
<div class="container-fluid gallery py-5">
    <div class="container py-5">
        <?= $this->session->flashdata('pesan') ?>
        <div class="text-center mx-auto mb-5" style="max-width: 800px;">
            <p class="fs-4 text-uppercase text-primary">Our Gallery</p>
            <h1 class="display-4 mb-4">Let's See Our Gallery</h1>
        </div>
        <div class="tab-class text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                <li class="nav-item">
                    <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#all">
                        <span class="text-dark" style="width: 150px;">All Gallery</span>
                    </a>
                </li>
                <?php foreach ($kategori as $row) : ?>
                    <li class="nav-item">
                        <a class="d-flex py-2 mx-3 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#<?= $row->kategori_baju ?>">
                            <span class="text-dark" style="width: 150px;"><?= $row->kategori_baju ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
            <div class="tab-content">
                <div id="all" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                <?php foreach ($baju as $row) : ?>
                                    <div class="col-lg-3">
                                        <div class="gallery-img">
                                            <img class="img-fluid rounded w-100" src="<?= base_url('upload/baju/' . $row->foto) ?>" alt="">
                                            <div class="gallery-overlay p-4">
                                                <h3 class="text-secondary fw-bold mb-2"><?= $row->kategori_baju ?></h3>
                                                <h4 class="text-dark fw-bold"><?= $row->nama_baju ?></h4>
                                                <small class="text-dark fw-bold">Rp <?= number_format($row->harga_sewa, 0, ',', '.') ?>/hari | Stok <?= $row->stok ?></small>
                                            </div>
                                            <div class="search-icon" style="margin-top:35%">
                                                <?php if (!empty($this->session->userdata('email'))) : ?>
                                                    <a href="<?= base_url('visitor/form_sewa/' . $row->id) ?>" class="my-auto"><i class="fas fa-search-plus btn-primary btn-primary-outline-0 rounded-circle p-3"></i></a>
                                                <?php else : ?>
                                                    <a href="<?= base_url('auth/login') ?>" class="my-auto"><i class="fas fa-search-plus btn-primary btn-primary-outline-0 rounded-circle p-3"></i></a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($kategori as $k) : ?>
                    <div id="<?= $k->kategori_baju ?>" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <?php foreach ($baju as $b) : ?>
                                        <?php if ($k->id == $b->id_kategori_baju) : ?>
                                            <div class="col-lg-3">
                                                <div class="gallery-img">
                                                    <img class="img-fluid rounded w-100" src="<?= base_url('upload/baju/' . $b->foto) ?>" alt="">
                                                    <div class="gallery-overlay p-4">
                                                        <h3 class="text-secondary fw-bold mb-2"><?= $b->kategori_baju ?></h3>
                                                        <h4 class="text-dark fw-bold"><?= $b->nama_baju ?></h4>
                                                        <small class="text-dark fw-bold">Rp <?= number_format($b->harga_sewa, 0, ',', '.') ?>/hari | Stok <?= $b->stok ?></small>
                                                    </div>
                                                    <div class="search-icon" style="margin-top:35%">
                                                        <a href="<?= base_url('visitor/form_sewa/' . $b->id) ?>" class="my-auto"><i class="fas fa-search-plus btn-primary btn-primary-outline-0 rounded-circle p-3"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<!-- gallery End -->
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb py-5">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mb-4">About Me</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item active text-white">About</li>
        </ol>
    </div>
</div>
<!-- Header End -->

<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="video">
                    <img src="<?= base_url('upload/profil/' . $profil->foto) ?>" class="img-fluid rounded" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <p class="fs-4 text-uppercase text-primary">About Us</p>
                <h1 class="display-4 mb-4"><?= $profil->header ?></h1>
                <p class="mb-4"><?= $profil->deskripsi ?></p>
            </div>
        </div>
    </div>
</div>
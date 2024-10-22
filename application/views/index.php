<!-- Carousel Start -->
<div class="container-fluid carousel-header px-0">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="<?= base_url('upload/banner/' . $banner_sewa->banner) ?>" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-primary text-uppercase mb-3"><?= $banner_sewa->take_line ?></h4>
                        <h1 class="display-1 text-capitalize text-dark mb-3"><?= $banner_sewa->header ?></h1>
                        <p class="mx-md-5 fs-4 px-4 mb-5 text-dark"><?= $banner_sewa->deskripsi ?></p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-5" href="<?= base_url('visitor/baju') ?>">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('upload/banner/' . $banner_mua->banner) ?>" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-primary text-uppercase mb-3" style="letter-spacing: 3px;"><?= $banner_mua->take_line ?></h4>
                        <h1 class="display-1 text-capitalize text-dark mb-3"><?= $banner_mua->header ?></h1>
                        <p class="mx-md-5 fs-4 px-5 mb-5 text-dark"><?= $banner_mua->deskripsi ?></p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-5" href="<?= base_url('visitor/mua') ?>">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

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

<!-- Appointment Start -->
<div class="container-fluid appointment py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="appointment-time p-5">
                    <h1 class="display-5 mb-4">Opening Hours</h1>
                    <div class="d-flex justify-content-between fs-5 text-white">
                        <p>Saturday:</p>
                        <p>05:00 am – 05:00 pm</p>
                    </div>
                    <div class="d-flex justify-content-between fs-5 text-white">
                        <p>Sunday:</p>
                        <p>05:00 am – 05:00 pm</p>
                    </div>
                    <div class="d-flex justify-content-between fs-5 text-white">
                        <p>Monday:</p>
                        <p>05:00 am – 05:00 pm</p>
                    </div>
                    <div class="d-flex justify-content-between fs-5 text-white">
                        <p>Tuesday:</p>
                        <p>05:00 am – 05:00 pm</p>
                    </div>
                    <div class="d-flex justify-content-between fs-5 text-white">
                        <p>Wednesday:</p>
                        <p>05:00 am – 05:00 pm</p>
                    </div>
                    <div class="d-flex justify-content-between fs-5 text-white">
                        <p>Thursday:</p>
                        <p>05:00 am – 05:00 pm</p>
                    </div>
                    <div class="d-flex justify-content-between fs-5 text-white">
                        <p>Friday:</p>
                        <p>05:00 am – 05:00 pm</p>
                    </div>

                    <p class="text-dark">Check out seasonal discounts for best offers.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-4 align-items-center">
            <div class="col-12">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="d-inline-flex bg-light w-100 border border-primary p-4 rounded">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Address</h4>
                                <p class="mb-0">Gg. Anoa 3, Trayeman, Kec. Slawi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-inline-flex bg-light w-100 border border-primary p-4 rounded">
                            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Mail Us</h4>
                                <p class="mb-0">dewisalon@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-inline-flex bg-light w-100 border border-primary p-4 rounded">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Telephone</h4>
                                <p class="mb-0">0877 3549 4059</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="rounded">
                    <iframe class="rounded-top w-100" style="height: 450px; margin-bottom: -6px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fbf579157ba4f%3A0x876e6fd1c4664373!2sGg.%20Anoa%203%2C%20Trayeman%2C%20Kec.%20Slawi%2C%20Kabupaten%20Tegal%2C%20Jawa%20Tengah%2052414!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>



            <div class=" text-center p-4 rounded-bottom bg-primary">
                <h4 class="text-white fw-bold">Follow Us</h4>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="#" class="btn btn-light btn-light-outline-0 btn-square rounded-circle me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-light btn-light-outline-0 btn-square rounded-circle me-3"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/luthfianaalisya?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="btn btn-light btn-light-outline-0 btn-square rounded-circle me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-light btn-light-outline-0 btn-square rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Contact End -->
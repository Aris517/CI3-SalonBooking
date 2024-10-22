<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sparlex - Spa Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('') ?>assets/template/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>assets/template/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>assets/template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('') ?>assets/template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('') ?>assets/template/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid sticky-top px-0">
        <div class="container-fluid topbar d-none d-lg-block">
            <div class="container px-0">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="d-flex flex-wrap">
                            <a href="https://maps.app.goo.gl/15R9U3V5UyC3RymY8" class="me-4 text-light"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                            <a href="https://wa.me/6287735494059" class="me-4 text-light"><i class="fas fa-phone-alt text-primary me-2"></i>087735494059</a>
                            <a href="#" class="text-light"><i class="fas fa-envelope text-primary me-2"></i>dewisalon@gmail.com</a>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="#" class="me-3 btn-square border rounded-circle nav-fill"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="me-3 btn-square border rounded-circle nav-fill"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/luthfianaalisya?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="me-3 btn-square border rounded-circle nav-fill"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn-square border rounded-circle nav-fill"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl">
                    <a href="<?= base_url('') ?>" class="navbar-brand">
                        <h1 class="text-primary display-4">Dewi Salon</h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                        <div class="navbar-nav mx-auto border-top">
                            <a href="<?= base_url('') ?>" class="nav-item nav-link <?= $menu == 'home' ? 'active' : '' ?>">Home</a>
                            <a href="<?= base_url('visitor/mua') ?>" class="nav-item nav-link <?= $menu == 'mua' ? 'active' : '' ?>">Booking MUA</a>
                            <a href="<?= base_url('visitor/baju') ?>" class="nav-item nav-link <?= $menu == 'baju' ? 'active' : '' ?>">Sewa Baju</a>
                            <a href="<?= base_url('visitor/about') ?>" class="nav-item nav-link <?= $menu == 'about' ? 'active' : '' ?>">About</a>
                            <a href="<?= base_url('visitor/contact') ?>" class="nav-item nav-link <?= $menu == 'contact' ? 'active' : '' ?>">Contact Us</a>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                            <?php if ($this->session->userdata('email')) : ?>
                                <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-4 ms-4">Logout</a>
                            <?php else : ?>
                                <a href="<?= base_url('auth/login') ?>" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-4 ms-4">Login</a>
                            <?php endif ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
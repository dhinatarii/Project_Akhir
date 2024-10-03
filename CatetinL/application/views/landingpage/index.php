<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Catet in</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo base_url('assets/css/responsive.css') ?>" rel="stylesheet" />
</head>

<style>
    .navbar-nav li {
        margin-right: 2rem;
    }

    .navbar-nav .nav-link {
        color: #445D48;
        position: relative;
        padding-bottom: 5px;
    }

    .navbar-nav .nav-link:before {
        content: "";
        position: absolute;
        width: 0%;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #50A06D;
        transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        font-weight: 600;
        color: #333333;
    }

    .navbar-nav .nav-link:hover:before {
        width: 100%;
    }

    .btn-login {
        border-color: #445D48;
        border-radius: 20px;
        background-color: transparent;
        color: #445D48;
        font-size: 16px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-login a {
        color: #445D48;
        padding: 18px;
    }

    .btn-login:hover {
        background-color: #445D48;
        color: #ffffff;
    }

    .btn-login:hover a {
        color: #ffffff;
    }

    .btn-custom {
        border-color: #445D48;
        background: #445D48;
        border-radius: 20px;
        color: #ffffff;
        font-size: 16px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-custom a {
        color: #ffffff;
        padding: 18px;
    }

    .btn-custom:hover {
        background-color: transparent;
        color: #445D48;
    }

    .btn-custom:hover a {
        color: #445D48;
    }

    .navbar-collapse {
        flex-grow: 0;
    }
</style>

<body style="background:#ffffff; font-family: 'Helvetica'; color: #333333">

    <div class="hero_area" style="background: #D2E4BA;">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <a class="navbar-brand" href="">
                        <img src="<?php echo base_url('assets/images/landingpage/img_logo.png') ?>" alt="" style="width: 50%">
                    </a>
                    <div class="collapse navbar-collapse d-flex justify-content-between align-items-center col-7" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li><a class="nav-link" href="#hero-section">Beranda</a></li>
                            <li><a class="nav-link" href="#product-section">Layanan</a></li>
                            <li><a class="nav-link" href="#contact-section">Kontak Kami</a></li>
                        </ul>
                        <div class="d-flex flex-row">
                            <button class="btn btn-login"><a href="<?php echo site_url('main/login'); ?>">Masuk</a></button>
                            <button class="btn btn-custom ml-2"><a href="<?php echo site_url('main/register'); ?>">Daftar</a></button>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <!--Hero Start-->
        <section class="" id="">
            <div class="">
                <div class="hero-content" style="display: flex; justify-content: space-between; align-items: center; margin-top:40px">
                    <div class="hero-section_left" style="flex: 1; padding-left:30px">
                        <h3 style="line-height: 50px;color: #333333;font-size: 40px; font-weight: 600;">
                            Kelola <span style="color: #50A06D">Pencatatan</span><br>
                            <span style="color: #50A06D">Penyewaan Pakaian</span> Sesuai<br>
                            Kebutuhan bisnis
                        </h3>
                        <p style="color: #252A38; padding-top:6px;">
                            Catetin merupakan aplikasi pengelola pencatatan penyewaan bisnis pakaian<br>dengan visi menghadirkan kemudahan dalam pengelolaan bisnis penyewaan<br>yang berkepanjangan
                        </p>
                        <a href="" class="" style="background: #445D48;">
                            Lihat Selengkapnya
                        </a>
                    </div>
                    <div class="hero-image" style="flex: 1; margin-left: 15px;">
                        <img src="<?php echo base_url('assets/images/landingpage/header.png'); ?>" alt="" style="width:75.5%;">
                    </div>
                </div>
            </div>
        </section>
        <!--Hero End-->
    </div>

    <!-- about section -->
    <section class="about-section" id="about-section" style="background: #ffffff;">
        <div class="container">
            <div class="heading_container">
                <h3 style="font-size: 32px; color:#333333">
                    Dapatkan Keuntungan Mencatat Bersama <span style="color: #50A06D">CATETIN</span>
                </h3>
            </div>
        </div>
        <div class="" style="padding-left:145px; padding-right:35px; padding-top:45px">
            <div class="row">
                <div class="col-md-3 d-flex align-items-center">
                    <img src="<?php echo base_url('assets/images/landingpage/icon_satu.png'); ?>" alt="" style="width: 45px; height: 45px; margin-right: 10px;">
                    <span>Membangun reputasi positif bisnis</span>
                </div>
                <div class="col-md-1 d-flex align-items-center"></div>
                <div class="col-md-3 d-flex align-items-center">
                    <img src="<?php echo base_url('assets/images/landingpage/icon_dua.png'); ?>" alt="" style="width: 35px; height: 35px; margin-right: 10px;">
                    <span>Transaksi sesuai harapan</span>
                </div>
                <div class="col-md-1 d-flex align-items-center"></div>
                <div class="col-md-3 d-flex align-items-center">
                    <img src="<?php echo base_url('assets/images/landingpage/icon_tiga.png'); ?>" alt="" style="width: 30px; height: 30px; margin-right: 10px;">
                    <span>Pelaporan yang terstruktur</span>
                </div>
            </div>
            <div class="row" style="margin-top:50px">
                <div class="col-md-3 d-flex align-items-center">
                    <img src="<?php echo base_url('assets/images/landingpage/icon_empat.png'); ?>" alt="" style="width: 28px; height: 28px; margin-right: 10px;">
                    <span>Memperkuat keunggulan kompetitif</span>
                </div>
                <div class="col-md-1 d-flex align-items-center"></div>
                <div class="col-md-3 d-flex align-items-center">
                    <img src="<?php echo base_url('assets/images/landingpage/icon_lima.png'); ?>" alt="" style="width: 35px; height: 35px; margin-right: 10px;">
                    <span>Kluster kategori sesuai kebutuhan</span>
                </div>
                <div class="col-md-1 d-flex align-items-center"></div>
                <div class="col-md-3 d-flex align-items-center">
                    <img src="<?php echo base_url('assets/images/landingpage/icon_enam.png'); ?>" alt="" style="width: 35px; height: 35px; margin-right: 10px;">
                    <span>Meningkatkan kredibilitas</span>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </section>
    <!-- end about section -->

    <!-- product section -->
    <section class="product-section" id="product-section" style="background: #ffffff;">
        <div class="heading_container" style="margin-top: 40px;">
            <h3 style="font-size: 32px; color:#333333">
                Layanan dan Kemudahan <span style="color: #50A06D">CATETIN</span>
            </h3>
        </div>
        <!-- detail product section -->
        <section class="detail-product-section" id="detail-product-section" style="margin-bottom:60px">
            <div class="row container_sub">
                <div class="col-md-7">
                    <img src="<?php echo base_url('assets/images/landingpage/img_fitur_transaksi.png'); ?>" alt="" style="width:80%">
                </div>
                <div class="col-md-5">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-start" style="text-align: start; margin-right: 50px">
                            <p style="color: #50A06D;">
                                Pencatatan Transaksi<br>
                                <span style="font-size: 26px; font-weight:600; color:#333333;">Transaksi</span><br>
                                <span style="color: #333333;">
                                    Catetin memiliki fitur yang sudah mengikuti perkembangan zaman, salah satunya fitur transaksi yang memungkinkan anda mengetahui secara detail tentang produk yang sedang disewa oleh penyewa produk anda.
                                </span>
                            </p>
                            <div class="row align-items-center" style="margin-top:50px;">
                                <div class="col-md-2">
                                    <img src="<?php echo base_url('assets/images/landingpage/icon_panah.png'); ?>" alt="" style="width:50%">
                                </div>
                                <span>Detail Project</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- KATEGORI -->
            <div class="row container_sub">
                <div class="col-md-5">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-start" style="text-align: start; margin-left: 75px">
                            <p style="color: #50A06D;">
                                Kemudahan filterisasi customer<br>
                                <span style="font-size: 26px; font-weight:600; color:#333333;">Kategori</span><br>
                                <span style="color: #333333;">
                                    Otomatisasi kategori yang sesuai kebutuhan penyewaan pakaian secara relevan dan menyeluruh.
                                </span>
                            </p>
                            <div class="row align-items-center" style="margin-top:50px;">
                                <div class="col-md-2">
                                    <img src="<?php echo base_url('assets/images/landingpage/icon_panah.png'); ?>" alt="" style="width:50%">
                                </div>
                                <span>Detail Project</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <img src="<?php echo base_url('assets/images/landingpage/img_fitur_kategori.png'); ?>" alt="" style="width:80%">
                </div>
            </div>
            <!-- LAPORAN -->
            <div class="row container_sub">
                <div class="col-md-7">
                    <img src="<?php echo base_url('assets/images/landingpage/img_fitur_laporan.png'); ?>" alt="" style="width:80%">
                </div>
                <div class="col-md-5">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-start" style="text-align: start; margin-right: 50px">
                            <p style="color: #50A06D;">
                                Arus keuangan yang tertata<br>
                                <span style="font-size: 26px; font-weight:600; color:#333333;">Laporan</span><br>
                                <span style="color: #333333;">
                                    Catetin menyediakan laporan keuangan perusahaan penyewaan secara menyeluruh dan menyesuaikan pengeluaran dan pemasukan perusahaan dari bulanan hingga tahunan.
                                </span>
                            </p>
                            <div class="row align-items-center" style="margin-top:50px;">
                                <div class="col-md-2">
                                    <img src="<?php echo base_url('assets/images/landingpage/icon_panah.png'); ?>" alt="" style="width:50%">
                                </div>
                                <span>Detail Project</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end detail product section -->

        <!-- footer section -->
        <footer class="container-fluid footer_section" id="contact-section" style="background: #D2E4BA;padding-left: 80px; padding-right:80px; padding-top:60px; padding-bottom:20px">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div>
                            <p style="font-weight: 600;">Info Catetin</p>
                            <p style="line-height: 35px; font-size: 15px">Tentang Kami<br>Layanan</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p style="font-weight: 600;">Kontak Catetin</p>
                        <p style="line-height: 35px; font-size: 15px">0274-7376313<br>+62 8122 8055 842<br><br>info@catetin.id</p>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5 text-right">
                        <img src="<?php echo base_url('assets/images/landingpage/img_logo.png') ?>" alt="" style="width: 50%">
                        <p style="text-align: right; font-size: 15px">
                            Jl. Wahid Hasyim No.5, Widoro Baru, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer section -->

        <!-- sosmed section -->
        <section>
            <div style="background: #D2E4BA; padding-top: 10px; padding-bottom:10px;">
                <hr>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div style="padding-left: 40px;">
                                <img src="<?php echo base_url('assets/images/landingpage/Facebook.png') ?>" alt="" style="width: 30px; height:30px">
                                <img src="<?php echo base_url('assets/images/landingpage/Instagram.png') ?>" alt="" style="width: 30px; height:30px; margin-left: 15px; margin-right: 15px;">
                                <img src="<?php echo base_url('assets/images/landingpage/LinkedIn.png') ?>" alt="" style="width: 30px; height:30px">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p style="text-align: right; padding-right: 40px;font-size: 15px;">© Catetin 2023. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end sosmed section -->

        <script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

</body>

</html>
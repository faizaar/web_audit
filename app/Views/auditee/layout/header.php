<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WEB - AUDIT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/img/logo-audit.png') ?>" type="image/png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
    <!-- Tambahkan di bagian <head> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-shield-alt mr-3"></i>Audit</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="<?= base_url('auditee/dashboard'); ?>" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Akun</a>
                        <div class="dropdown-menu m-0">
                            <a href="<?= base_url('auditee/profile'); ?>" class="dropdown-item">Profile</a>
                            <a href="<?= base_url('auditee/logout'); ?>" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Audit</a>
                        <div class="dropdown-menu m-0">
                            <a href="<?= base_url('auditee/jadwal'); ?>" class="dropdown-item">Jadwal Audit</a>
                            <a href="<?= base_url('auditee/hasil_penilaian'); ?>" class="dropdown-item">Tanggapan Audit</a>
                            <!-- <a href="testimonial.html" class="dropdown-item">Kosong</a>  -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Data</a>
                        <div class="dropdown-menu m-0">
                            <a href="<?= base_url('auditee/aset'); ?>" class="dropdown-item">Data Aset</a>
                            <a href="<?= base_url('auditee/dokumen'); ?>" class="dropdown-item">Data Dokumen</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

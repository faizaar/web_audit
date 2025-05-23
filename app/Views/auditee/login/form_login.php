<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WEB - AUDIT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<!-- Contact Start -->
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-body p-5">
                <h3 class="text-center mb-4 text-primary">Login Auditee</h3>
                <!-- ✅ Di sinilah kamu taruh pesan error -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                <form action="<?= base_url('auditee/process_login'); ?>" method="post" >
                    <div class="form-group mb-4">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" id="nip" name="nip" class="form-control form-control-lg rounded-3" placeholder="Masukkan NIP Anda" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3 shadow-sm" >Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Contact End -->
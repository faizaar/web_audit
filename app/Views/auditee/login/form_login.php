<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WEB - AUDIT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-body p-5">
                <h3 class="text-center mb-4 text-primary">Login Akun</h3>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>
                
                <form action="<?= base_url('login/process'); ?>" method="post">
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control rounded-3" placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control rounded-3" placeholder="Masukkan Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-3 shadow-sm">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

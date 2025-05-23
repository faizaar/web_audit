<!-- Fonts and icons     -->
<!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" /> -->
<!-- Nucleo Icons -->
<!-- <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" /> -->
<!-- Font Awesome Icons
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
<!-- Material Icons
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" /> -->
<!-- CSS Files -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WEB - AUDIT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Owl Carousel Stylesheet -->
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- Material Dashboard CSS -->
    <link href="../../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body>

    <!-- Jadwal Table Start -->
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Jadwal Audit</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-xs font-weight-bold mb-0">
                                            ID Kegiatan</th>
                                        <th
                                            class="text-xs font-weight-bold mb-0">
                                            Nama Kegiatan</th>
                                        <th class="text-xs font-weight-bold mb-0">
                                            Hari / Tanggal</th>
                                        <th class="text-xs font-weight-bold mb-0">
                                            Jam</th>
                                        <th class="text-xs font-weight-bold mb-0">
                                            Target Luaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataMb as $row): ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            <?= htmlspecialchars($row->id_kegiatan) ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                        <?= htmlspecialchars($row->nama_kegiatan) ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                        <?= htmlspecialchars($row->hari_tanggal) ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                        <?= htmlspecialchars($row->jam) ?></h6>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                        <?= htmlspecialchars($row->target_luaran) ?></h6>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts (jQuery, Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
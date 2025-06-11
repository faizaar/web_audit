<<<<<<< HEAD
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <!-- Tambahkan ini di bagian <head> -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
  .audit-step-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
  }

  .audit-card {
    transition: transform 0.2s ease;
  }

  .audit-card:hover {
    transform: translateY(-4px);
  }
</style>

<!-- Konten Utama -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <div class="container-fluid py-4">

    <!-- Header -->
    <!-- Ucapan Selamat Datang dan Deskripsi Sistem -->
<div class="row mb-4">
  <div class="col-12">
    <div class="card shadow-sm border-0 bg-light">
      <div class="card-body py-4 px-4">
        <h3 class="text-dark mb-2">Selamat datang di Sistem Audit Internal</h3>
        <p class="text-muted mb-1">
          Sistem ini dirancang untuk membantu auditor dalam melaksanakan proses audit secara efisien dan terstruktur. 
        </p>
        <p class="text-muted mb-0">
          Silakan ikuti alur audit di bawah ini untuk memulai proses pemeriksaan, penilaian, hingga pelaporan.
        </p>
      </div>
    </div>
  </div>
</div>


    <!-- Langkah-langkah Audit -->
    <div class="row gy-4 gx-3">

      <!-- Langkah 1 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-primary shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-primary me-3">
              <i class="material-icons">login</i>
            </div>
            <div>
              <h5 class="card-title mb-1">1. Login sebagai Auditor</h5>
              <p class="card-text text-sm text-muted">Masuk ke sistem menggunakan akun auditor untuk mengakses dashboard audit.</p>
=======
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group input-group-outline">
            <label class="form-label">Type here...</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <ul class="navbar-nav d-flex align-items-center  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0">
              <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
            </a>
          </li>
          <li class="nav-item dropdown pe-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="material-symbols-rounded">notifications</i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New message</span> from Laur
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        13 minutes ago
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/small-logos/logo-spotify.svg"
                        class="avatar avatar-sm bg-gradient-dark  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New album</span> by Travis Scott
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        1 day
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                      <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>credit-card</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(453.000000, 454.000000)">
                                <path class="color-background"
                                  d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                  opacity="0.593633743"></path>
                                <path class="color-background"
                                  d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                </path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        Payment successfully completed
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        2 days
                      </p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
              <i class="material-symbols-rounded">account_circle</i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid py-2">
    <div class="row">
      <!-- Card Total Dokumen -->
      <div class="col-xl-3 col-sm-6 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Dokumen Masuk</p>
                  <h5 class="font-weight-bolder mb-0">
                    <?= $total_dokumen ?>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="material-icons opacity-10">upload_file</i>
                </div>
              </div>
>>>>>>> c5d1b21591cd36d6309f4f595a8f52de13bf3f5b
            </div>
          </div>
        </div>
      </div>

<<<<<<< HEAD
      <!-- Langkah 2 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-info shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-info me-3">
              <i class="material-icons">fact_check</i>
            </div>
            <div>
              <h5 class="card-title mb-1">2. Lihat Audit Berjalan</h5>
              <p class="card-text text-sm text-muted">Tinjau daftar kegiatan audit yang sedang berlangsung dan pilih jadwal audit.</p>
=======
      <!-- Card Total Aset -->
      <div class="col-xl-3 col-sm-6 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Aset</p>
                  <h5 class="font-weight-bolder mb-0">
                    <?= $total_aset ?>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                  <i class="material-icons opacity-10">category</i>
                </div>
              </div>
>>>>>>> c5d1b21591cd36d6309f4f595a8f52de13bf3f5b
            </div>
          </div>
        </div>
      </div>
<<<<<<< HEAD

      <!-- Langkah 3 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-warning shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-warning me-3">
              <i class="material-icons">calendar_month</i>
            </div>
            <div>
              <h5 class="card-title mb-1">3. Pilih Jadwal Audit</h5>
              <p class="card-text text-sm text-muted">Lihat rincian jadwal, lokasi, dan unit yang akan diaudit sesuai yang ditugaskan.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 4 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-success shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-success me-3">
              <i class="material-icons">inventory</i>
            </div>
            <div>
              <h5 class="card-title mb-1">4. Lihat Aset & Risiko</h5>
              <p class="card-text text-sm text-muted">Telusuri aset penting dan potensi risiko dari auditee yang menjadi fokus audit.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 5 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-danger shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-danger me-3">
              <i class="material-icons">grade</i>
            </div>
            <div>
              <h5 class="card-title mb-1">5. Tambahkan Penilaian</h5>
              <p class="card-text text-sm text-muted">Lakukan pengisian dan penilaian indikator komponen berdasarkan observasi.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 6 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-secondary shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-secondary me-3">
              <i class="material-icons">upload_file</i>
            </div>
            <div>
              <h5 class="card-title mb-1">6. Unggah Dokumen Pendukung</h5>
              <p class="card-text text-sm text-muted">Unggah dokumen sebagai bukti audit atau pilih dari daftar dokumen yang tersedia.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 7 -->
      <div class="col-md-12">
        <div class="card audit-card h-100 border-start border-5 border-dark shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-dark me-3">
              <i class="material-icons">description</i>
            </div>
            <div>
              <h5 class="card-title mb-1">7. Isi Laporan Audit</h5>
              <p class="card-text text-sm text-muted">Masukkan seluruh temuan dan rekomendasi ke dalam laporan audit akhir.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

</main>
=======
    </div>


    <!-- Tabel Jadwal Audit Terdekat -->
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Jadwal Audit Terdekat</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kegiatan</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Waktu</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Target</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                    <!-- <th class="text-secondary opacity-7"></th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($jadwal_terdekat as $jadwal): ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <!-- <div>
                            <img src="<?= base_url('assets/img/default-avatar.png') ?>" class="avatar avatar-sm me-3"
                              alt="user1">
                          </div> -->
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $jadwal['nama_kegiatan'] ?></h6>
                            <p class="text-xs text-secondary mb-0">Auditee: <?= $jadwal['auditee'] ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $jadwal['jam'] ?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $jadwal['target_luaran'] ?></p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?= $jadwal['hari_tanggal'] ?></span>
                      </td>
                      <!-- <td class="align-middle">
                        <a href="#" class="text-secondary font-weight-bold text-xs">Edit</a>
                      </td> -->
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
>>>>>>> c5d1b21591cd36d6309f4f595a8f52de13bf3f5b

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand px-4 py-3 m-0" href="https://demos.creative-tim.com/material-dashboard/pages/dashboard" target="_blank">
      <img src="../../assets/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
      <span class="ms-1 text-sm text-dark">Super Admin</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active bg-gradient-dark text-white" href="<?= base_url('dashboard') ?>">
          <i class="material-symbols-rounded opacity-5">dashboard</i>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>

      <!-- Menu Data Tabel -->
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('auditor/alat') ?>">
          <i class="material-symbols-rounded opacity-5">build</i>
          <span class="nav-link-text ms-1">Alat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('view/alokasi') ?>">
          <i class="material-symbols-rounded opacity-5">inventory</i>
          <span class="nav-link-text ms-1">Alokasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('auditor/aset') ?>">
          <i class="material-symbols-rounded opacity-5">category</i>
          <span class="nav-link-text ms-1">Aset</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('auditor/audit') ?>">
          <i class="material-symbols-rounded opacity-5">fact_check</i>
          <span class="nav-link-text ms-1">Audit</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('auditor/dokumen') ?>">
          <i class="material-symbols-rounded opacity-5">description</i>
          <span class="nav-link-text ms-1">Dokumen</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('auditor/komponen') ?>">
          <i class="material-symbols-rounded opacity-5">checklist</i>
          <span class="nav-link-text ms-1">Komponen Penilaian</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('auditor/laporan_hasil') ?>">
          <i class="material-symbols-rounded opacity-5">analytics</i>
          <span class="nav-link-text ms-1">Laporan Audit</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('auditor/risiko') ?>">
          <i class="material-symbols-rounded opacity-5">warning</i>
          <span class="nav-link-text ms-1">Risiko</span>
        </a>
      </li>

      <!-- Akun & Auth -->
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account Pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('profile') ?>">
          <i class="material-symbols-rounded opacity-5">person</i>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('sign-in') ?>">
          <i class="material-symbols-rounded opacity-5">login</i>
          <span class="nav-link-text ms-1">Sign In</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="<?= base_url('sign-up') ?>">
          <i class="material-symbols-rounded opacity-5">assignment</i>
          <span class="nav-link-text ms-1">Sign Up</span>
        </a>
      </li>
    </ul>
  </div>
</aside>

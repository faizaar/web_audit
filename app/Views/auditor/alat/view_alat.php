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
        <ul class="navbar-nav d-flex align-items-center justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank"
              href="https://www.creative-tim.com/builder?ref=navbar-material-dashboard">Online Builder</a>
          </li>
          <li class="mt-1">
            <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
              data-icon="octicon-star" data-size="large" data-show-count="true"
              aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          </li>
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
            <!-- Notifikasi dropdown di sini -->
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

  <!-- Table Card -->
  <div class="card m-3">
    <div class="card-header pb-0">
      <h6>Data Alat Auditor</h6>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-3" style="max-height: 500px; overflow-y: auto;">
        <table class="table table-hover table-bordered align-items-center mb-0">
          <thead class="bg-light">
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">ID Alat</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama Alat</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Spesifikasi</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Disiapkan Oleh</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Fungsi</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($dataMb)): ?>
              <?php $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
              $limit = 20;
              $offset = ($page - 1) * $limit;
              $total = count($dataMb);
              $paginated = array_slice($dataMb, $offset, $limit);
              ?>
              <?php foreach ($paginated as $a): ?>
                <tr>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"><?= $a['id_alat'] ?></p>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"><?= $a['nama_alat'] ?></p>
                  </td>
                  <td style="white-space: normal; word-wrap: break-word;">
                    <p class="text-xs text-secondary mb-0"><?= $a['spesifikasi'] ?></p>
                  </td>
                  <td>
                    <p class="text-xs text-secondary mb-0"><?= $a['disiapkan_oleh'] ?></p>
                  </td>
                  <td style="white-space: normal; word-wrap: break-word;">
                    <p class="text-xs text-secondary mb-0"><?= $a['fungsi'] ?></p>
                  </td>
                  <td class="align-middle">
                    <a href="<?= base_url('auditor/edit_alat/' . $a['id_alat']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('auditor/hapus_alat/' . $a['id_alat']) ?>" class="btn btn-sm btn-danger"
                      onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center text-secondary">Tidak ada data.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
          <nav>
            <ul class="pagination pagination-sm">
              <?= $pager->links('alat', 'custom') ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <form action="<?= isset($alat) ? base_url('auditor/alat/update_alat/' . $alat['id_alat']) : base_url('auditor/alat/store_alat') ?>" method="post">
    <div class="form-group">
        <label for="kode_alat">Kode Alat</label>
        <input type="text" class="form-control" name="kode_alat" value="<?= isset($alat) ? $alat['kode_alat'] : '' ?>" required>
    </div>
    <div class="form-group">
        <label for="nama_alat">Nama Alat</label>
        <input type="text" class="form-control" name="nama_alat" value="<?= isset($alat) ? $alat['nama_alat'] : '' ?>" required>
    </div>
    <div class="form-group">
        <label for="spesifikasi">Spesifikasi</label>
        <textarea class="form-control" name="spesifikasi" required><?= isset($alat) ? $alat['spesifikasi'] : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="disiapkan_oleh">Disiapkan Oleh</label>
        <input type="text" class="form-control" name="disiapkan_oleh" value="<?= isset($alat) ? $alat['disiapkan_oleh'] : '' ?>" required>
    </div>
    <div class="form-group">
        <label for="fungsi">Fungsi</label>
        <textarea class="form-control" name="fungsi" required><?= isset($alat) ? $alat['fungsi'] : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="id_auditee">ID Auditee</label>
        <input type="text" class="form-control" name="id_auditee" value="<?= isset($alat) ? $alat['id_auditee'] : '' ?>" required>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($alat) ? 'Perbarui' : 'Simpan' ?></button>
</form>

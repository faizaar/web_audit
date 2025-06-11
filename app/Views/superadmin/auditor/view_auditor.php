<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tabel Auditor</li>
                </ol>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                        <form method="get" action="<?= base_url('superadmin/auditor') ?>"
                            class="input-group input-group-outline">
                            <input type="text" class="form-control" placeholder="Cari..." name="keyword"
                                value="<?= esc($keyword ?? '') ?>">
                        </form>
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
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="material-symbols-rounded">notifications</i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
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
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
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
        <div class="card m-3">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Data Akun Auditor</h6>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modalTambahAuditor">Tambah Auditor</button>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-3" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-hover table-bordered align-items-center mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Kode Auditor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Bidang Keahlian
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Peran</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">User Terkait</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1 + (5 * ((int) ($pager->getCurrentPage('auditee') ?? 1) - 1));
                            foreach ($auditor as $row): ?>
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $no++ ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['kode_auditor'] ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama'] ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['bidang_keahlian'] ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0"><?= $row['peran'] ?></p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            <?php
                                            $user = array_filter($allUsers, fn($u) => $u['id_user'] == $row['id_user']);
                                            echo $user ? esc(array_values($user)[0]['username']) : 'Tidak diketahui';
                                            ?>
                                        </p>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalEditAuditor<?= $row['id_auditor'] ?>">Edit</button>
                                        <a href="<?= base_url('superadmin/auditor/delete/' . $row['id_auditor']) ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        <nav>
                            <ul class="pagination pagination-sm">
                                <?= $pager->links('auditor', 'custom') ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Auditor -->
    <div class="modal fade" id="modalTambahAuditor" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?= base_url('superadmin/auditor/save') ?>" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Auditor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label>Kode Auditor</label><input type="text" name="kode_auditor"
                            class="form-control" required></div>
                    <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3"><label>Bidang Keahlian</label><input type="text" name="bidang_keahlian"
                            class="form-control" required></div>
                    <div class="mb-3"><label>Peran</label><input type="text" name="peran" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>User Terkait</label>
                        <select name="id_user" class="form-select" required>
                            <option value="">-- Pilih Username --</option>
                            <?php foreach ($users as $u): ?>
                                <option value="<?= $u['id_user'] ?>"><?= esc($u['username']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit untuk setiap Auditor -->
    <?php foreach ($auditor as $row): ?>
        <div class="modal fade" id="modalEditAuditor<?= $row['id_auditor'] ?>" tabindex="-1">
            <div class="modal-dialog">
                <form action="<?= base_url('superadmin/auditor/update/' . $row['id_auditor']) ?>" method="post"
                    class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Auditor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"><label>Kode Auditor</label><input type="text" name="kode_auditor"
                                class="form-control" value="<?= esc($row['kode_auditor']) ?>" required></div>
                        <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control"
                                value="<?= esc($row['nama']) ?>" required></div>
                        <div class="mb-3"><label>Bidang Keahlian</label><input type="text" name="bidang_keahlian"
                                class="form-control" value="<?= esc($row['bidang_keahlian']) ?>" required></div>
                        <div class="mb-3"><label>Peran</label><input type="text" name="peran" class="form-control"
                                value="<?= esc($row['peran']) ?>" required></div>
                        <div class="mb-3">
                            <label>User Terkait</label>
                            <select name="id_user" class="form-select" required>
                                <option value="">-- Pilih Username --</option>
                                <?php
                                $usedUserIds = array_column($auditor, 'id_user');
                                foreach ($users as $u):
                                    if (!in_array($u['id_user'], $usedUserIds)): ?>
                                        <option value="<?= $u['id_user'] ?>"><?= esc($u['username']) ?></option>
                                        <?php
                                    endif;
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
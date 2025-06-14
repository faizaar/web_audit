<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
        target="_blank">
        <img src="../assets/img/logo-audit.png" class="navbar-brand-img" width="35" height="35" alt="main_logo">
        <span class="ms-1 text-sm text-dark">SuperAdmin</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == 'superadmin') ? 'active bg-gradient-dark text-white' : 'text-dark' ?>"
            href="<?= base_url('superadmin') ?>">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == 'superadmin/auditee') ? 'active bg-gradient-dark text-white' : 'text-dark' ?>" href="<?= base_url('superadmin/auditee') ?>">
            <i class="material-symbols-rounded opacity-5">table_view</i>
            <span class="nav-link-text ms-1">Auditee</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == 'superadmin/auditor') ? 'active bg-gradient-dark text-white' : 'text-dark' ?>" href="<?= base_url('superadmin/auditor') ?>">
            <i class="material-symbols-rounded opacity-5">receipt_long</i>
            <span class="nav-link-text ms-1">Auditor</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == 'superadmin/users') ? 'active bg-gradient-dark text-white' : 'text-dark' ?>" href="<?= base_url('superadmin/users') ?>">
            <i class="material-symbols-rounded opacity-5">receipt_long</i>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= (uri_string() == 'auditor/logout') ? 'active bg-gradient-dark text-white' : 'text-dark' ?>" href="<?= base_url('auditor/logout') ?>">
            <i class="material-symbols-rounded opacity-5">login</i>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-dark mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div> -->
  </aside>
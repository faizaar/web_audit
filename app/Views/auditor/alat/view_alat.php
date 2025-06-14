<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>
  </nav>

  <!-- Table Card -->
  <div class="card m-3">
    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
      <h6>Data Audit</h6>
      <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-3" style="max-height: 500px; overflow-y: auto;">
        <table class="table table-hover table-bordered align-items-center mb-0">
          <thead class="bg-light">
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder">NO</th>
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
              <?php $no = 1 + (20 * ($currentPage - 1)); ?>
              <?php foreach ($dataMb as $a): ?>
                <tr>
                  <td><p class="text-xs font-weight-bold mb-0"><?= $no++ ?></p></td>
                  <td><p class="text-xs font-weight-bold mb-0"><?= $a['id_alat'] ?></p></td>
                  <td><p class="text-xs font-weight-bold mb-0"><?= $a['nama_alat'] ?></p></td>
                  <td><p class="text-xs text-secondary mb-0"><?= $a['spesifikasi'] ?></p></td>
                  <td><p class="text-xs text-secondary mb-0"><?= $a['disiapkan_oleh'] ?></p></td>
                  <td><p class="text-xs text-secondary mb-0"><?= $a['fungsi'] ?></p></td>
                  <td class="align-middle">
                  <button
  type="button"
  class="btn btn-sm btn-warning btnEdit"
  data-bs-toggle="modal"
  data-bs-target="#modalEdit"
  data-id="<?= $a['id_alat'] ?>"
  data-kode="<?= $a['kode_alat'] ?>"
  data-nama="<?= $a['nama_alat'] ?>"
  data-spesifikasi="<?= $a['spesifikasi'] ?>"
  data-disiapkan="<?= $a['disiapkan_oleh'] ?>"
  data-fungsi="<?= $a['fungsi'] ?>"
>
  Edit
</button>

                    <a href="<?= base_url('auditor/alat/delete_alat/' . $a['id_alat']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center text-secondary">Tidak ada data.</td>
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

  <!-- Modal Tambah -->
  <div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <form action="<?= base_url('auditor/alat/store_alat') ?>" method="post" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Alat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body row g-3">
          <div class="col-md-6">
            <label for="kode_alat">Kode Alat</label>
            <input type="text" class="form-control" name="kode_alat" required>
          </div>
          <div class="col-md-6">
            <label for="nama_alat">Nama Alat</label>
            <input type="text" class="form-control" name="nama_alat" required>
          </div>
          <div class="col-md-12">
            <label for="spesifikasi">Spesifikasi</label>
            <textarea class="form-control" name="spesifikasi" required></textarea>
          </div>
          <div class="col-md-6">
            <label for="disiapkan_oleh">Disiapkan Oleh</label>
            <input type="text" class="form-control" name="disiapkan_oleh" required>
          </div>
          <div class="col-md-6">
            <label for="fungsi">Fungsi</label>
            <textarea class="form-control" name="fungsi" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form id="formEditAlat" method="post" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Alat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body row g-3">
        <input type="hidden" name="id_alat" id="edit_id_alat">
        <div class="col-md-6">
          <label for="edit_kode_alat">Kode Alat</label>
          <input type="text" class="form-control" name="kode_alat" id="edit_kode_alat" required>
        </div>
        <div class="col-md-6">
          <label for="edit_nama_alat">Nama Alat</label>
          <input type="text" class="form-control" name="nama_alat" id="edit_nama_alat" required>
        </div>
        <div class="col-md-12">
          <label for="edit_spesifikasi">Spesifikasi</label>
          <textarea class="form-control" name="spesifikasi" id="edit_spesifikasi" required></textarea>
        </div>
        <div class="col-md-6">
          <label for="edit_disiapkan_oleh">Disiapkan Oleh</label>
          <input type="text" class="form-control" name="disiapkan_oleh" id="edit_disiapkan_oleh" required>
        </div>
        <div class="col-md-6">
          <label for="edit_fungsi">Fungsi</label>
          <textarea class="form-control" name="fungsi" id="edit_fungsi" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </div>
    </form>
  </div>
</div>

</main>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".btnEdit");
    const formEdit = document.getElementById("formEditAlat");

    editButtons.forEach(btn => {
      btn.addEventListener("click", function () {
        const id = this.getAttribute("data-id");
        const kode = this.getAttribute("data-kode");
        const nama = this.getAttribute("data-nama");
        const spesifikasi = this.getAttribute("data-spesifikasi");
        const disiapkan = this.getAttribute("data-disiapkan");
        const fungsi = this.getAttribute("data-fungsi");
        const auditee = this.getAttribute("data-auditee");

        formEdit.action = `<?= base_url('auditor/alat/update_alat/') ?>/${id}`;
        document.getElementById("edit_id_alat").value = id;
        document.getElementById("edit_kode_alat").value = kode;
        document.getElementById("edit_nama_alat").value = nama;
        document.getElementById("edit_spesifikasi").value = spesifikasi;
        document.getElementById("edit_disiapkan_oleh").value = disiapkan;
        document.getElementById("edit_fungsi").value = fungsi;
      });
    });
  });
</script>

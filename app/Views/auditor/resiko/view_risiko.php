<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="#">Pages</a></li>
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
      </div>
    </div>
  </nav>

  <!-- Table Card Risiko -->

      <!-- Tabel Risiko -->
      <!-- Table Card -->
  <div class="card m-3">
    <div class="card-header pb-0">
      <h6>Data Risiko</h6>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="d-flex justify-content-between align-items-center px-3 pb-3">
        <h6 class="mb-0">Daftar Risiko</h6>
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalTambahRisiko">
          <i class="material-symbols-rounded" style="vertical-align: middle;">add</i> Tambah Data Risiko
        </button>
      </div>

      <!-- Tabel Risiko -->
      <div class="table-responsive p-3" style="max-height: 500px; overflow-y: auto;">
        <table class="table table-hover table-bordered align-items-start mb-0">
          <thead class="bg-light">
            <tr>
              <th>Kode Risiko</th>
              <th>Kode Aset</th>
              <th>Penyebab</th>
              <th>Dampak</th>
              <th>Nilai Frekuensi</th>
              <th>Nilai Risiko</th>
              <th>Total Frek. Risiko</th>
              <th>Mitigasi Penyebab</th>
              <th>Mitigasi Dampak</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($dataMb)): ?>
              <?php foreach ($dataMb as $r): ?>
              <tr>
                <td><?= esc($r['kode_risiko']) ?></td>
                <td><?= esc($r['kode_aset']) ?></td>
                <td style="white-space: normal;"><?= esc($r['penyebab']) ?></td>
                <td style="white-space: normal;"><?= esc($r['dampak']) ?></td>
                <td><?= esc($r['nilai_frekuensi']) ?></td>
                <td><?= esc($r['nilai_risiko']) ?></td>
                <td><?= esc($r['total_frekuensi_risiko']) ?></td>
                <td style="white-space: normal;"><?= esc($r['mitigasi_penyebab']) ?></td>
                <td style="white-space: normal;"><?= esc($r['mitigasi_dampak']) ?></td>
                <td>
                  <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditRisiko<?= $r['kode_risiko'] ?>">Edit</button>
                  <a href="<?= base_url('auditor/resiko/hapus_risiko/' . $r['kode_risiko']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data risiko ini?')">Hapus</a>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="modalEditRisiko<?= $r['kode_risiko'] ?>" tabindex="-1" aria-labelledby="modalEditRisikoLabel<?= $r['kode_risiko'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <form action="<?= base_url('auditor/resiko/update_risiko') ?>" method="post">
                      <input type="hidden" name="kode_risiko" value="<?= esc($r['kode_risiko']) ?>">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalEditRisikoLabel<?= $r['kode_risiko'] ?>">Edit Risiko: <?= esc($r['kode_risiko']) ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row g-3">
                          <div class="col-md-6">
                            <label class="form-label">Kode Aset</label>
                            <select name="kode_aset" class="form-select" required>
                              <?php foreach ($aset as $a): ?>
                                <option value="<?= $a['kode_aset'] ?>" <?= $a['kode_aset'] == $r['kode_aset'] ? 'selected' : '' ?>>
                                  <?= $a['kode_aset'] ?> - <?= $a['nama_aset'] ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Penyebab</label>
                            <textarea name="penyebab" class="form-control" required><?= esc($r['penyebab']) ?></textarea>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Dampak</label>
                            <textarea name="dampak" class="form-control" required><?= esc($r['dampak']) ?></textarea>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Nilai Frekuensi</label>
                            <input type="number" name="nilai_frekuensi" class="form-control" value="<?= esc($r['nilai_frekuensi']) ?>" required>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Nilai Risiko</label>
                            <input type="number" name="nilai_risiko" class="form-control" value="<?= esc($r['nilai_risiko']) ?>" required>
                          </div>
                          <div class="col-md-4">
                            <label class="form-label">Total Frekuensi Risiko</label>
                            <input type="number" name="total_frekuensi_risiko" class="form-control" value="<?= esc($r['total_frekuensi_risiko']) ?>" required>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Mitigasi Penyebab</label>
                            <textarea name="mitigasi_penyebab" class="form-control" required><?= esc($r['mitigasi_penyebab']) ?></textarea>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Mitigasi Dampak</label>
                            <textarea name="mitigasi_dampak" class="form-control" required><?= esc($r['mitigasi_dampak']) ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="10" class="text-center text-secondary">Tidak ada data risiko.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Data Risiko -->
  <div class="modal fade" id="modalTambahRisiko" tabindex="-1" aria-labelledby="modalTambahRisikoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form action="<?= base_url('auditor/resiko/simpan_risiko') ?>" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTambahRisikoLabel">Tambah Data Risiko</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Kode Risiko</label>
                <input type="text" class="form-control" name="kode_risiko" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Kode Aset</label>
                <select name="kode_aset" class="form-select" required>
                  <option value="" disabled selected>-- Pilih Kode Aset --</option>
                  <?php foreach ($aset as $a): ?>
                    <option value="<?= $a['kode_aset'] ?>">
                      <?= $a['kode_aset'] ?> - <?= $a['nama_aset'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Penyebab</label>
                <textarea class="form-control" name="penyebab" required></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Dampak</label>
                <textarea class="form-control" name="dampak" required></textarea>
              </div>
              <div class="col-md-4">
                <label class="form-label">Nilai Frekuensi</label>
                <input type="number" class="form-control" name="nilai_frekuensi" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">Nilai Risiko</label>
                <input type="number" class="form-control" name="nilai_risiko" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">Total Frekuensi Risiko</label>
                <input type="number" class="form-control" name="total_frekuensi_risiko" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Mitigasi Penyebab</label>
                <textarea class="form-control" name="mitigasi_penyebab" required></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label">Mitigasi Dampak</label>
                <textarea class="form-control" name="mitigasi_dampak" required></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
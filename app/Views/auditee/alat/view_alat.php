<div class="container mt-5">
  <div class="card shadow-sm border-0">
    <div class="card-header text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Alat Auditee</h5>
      <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kontenModal">
        <i class="fas fa-plus me-1"></i> Tambah Data
      </button>
    </div>
    <div class="card-body px-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0">
          <thead class="table-light text-center">
            <tr>
              <th class="text-nowrap">Kode Alat</th>
              <th>Nama Alat</th>
              <th>Spesifikasi</th>
              <th>Disiapkan Oleh</th>
              <th>Fungsi</th>
              <th class="text-center text-nowrap" style="width: 100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($data)): ?>
              <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data alat.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($data as $row): ?>
                <tr>
                  <td><?= esc($row['kode_alat']) ?></td>
                  <td><?= esc($row['nama_alat']) ?></td>
                  <td><?= esc($row['spesifikasi']) ?></td>
                  <td><?= esc($row['disiapkan_oleh']) ?></td>
                  <td><?= esc($row['fungsi']) ?></td>
                  <td class="text-center">
                    <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal"
                      data-bs-target="#editModal<?= $row['id_alat'] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <a href="<?= base_url('auditor/alat/hapus_alat/' . $row['id_alat']) ?>"
                      class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


                <!-- Modal Edit -->
                <div class="modal fade" id="editModal<?= $row['id_alat'] ?>" tabindex="-1"
                  aria-labelledby="editModalLabel<?= $row['id_alat'] ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <form method="post" action="<?= base_url('auditor/alat/update_alat/') ?>">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Alat</h5>
                          <button type="button" class="btn avatar-sm" data-bs-dismiss="modal" aria-label="Tutup">&times;</button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="id_alat" value="<?= $row['id_alat'] ?>">
                          <div class="mb-3">
                            <label for="">Kode Alat</label>
                            <input type="text" name="kode_alat" value="<?= esc($row['kode_alat']) ?>"
                              class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label for="">Nama Alat</label>
                            <input type="text" name="nama_alat" value="<?= esc($row['nama_alat']) ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label for="">Spesifikasi</label>
                            <textarea name="spesifikasi" class="form-control"
                              required><?= esc($row['spesifikasi']) ?></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="">Disiapkan Oleh</label>
                            <input type="text" name="disiapkan_oleh" value="<?= esc($row['disiapkan_oleh']) ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label for="">Fungsi</label>
                            <textarea name="fungsi" class="form-control"
                              required><?= esc($row['fungsi']) ?></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success btn-sm">Simpan Perubahan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="editModal<?= $row['id_alat'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id_alat'] ?>" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('auditor/alat/update_alat/') ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Alat</h5>
          <button type="button" class="btn avatar-sm" data-bs-dismiss="modal" aria-label="Tutup">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_alat" value="<?= $row['id_alat'] ?>">
          <div class="mb-3">
            <label for="kode_alat">Kode Alat</label>
            <input type="text" name="kode_alat" value="<?= esc($row['kode_alat']) ?>" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="nama_alat">Nama Alat</label>
            <input type="text" name="nama_alat" value="<?= esc($row['nama_alat']) ?>" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="spesifikasi">Spesifikasi</label>
            <textarea name="spesifikasi" class="form-control" required><?= esc($row['spesifikasi']) ?></textarea>
          </div>
          <div class="mb-3">
            <label for="disiapkan_oleh">Disiapkan Oleh</label>
            <input type="text" name="disiapkan_oleh" value="<?= esc($row['disiapkan_oleh']) ?>" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="fungsi">Fungsi</label>
            <textarea name="fungsi" class="form-control" required><?= esc($row['fungsi']) ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm">Simpan Perubahan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="container mt-5">
  <div class="card shadow-sm border-0">
    <div class="card-header text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Alat Auditee</h5>
      <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kontenModal">
        <i class="fas fa-plus me-1"></i> Tambah Data
      </button>
    </div>
    <div class="card-body px-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0">
          <thead class="table-light text-center">
            <tr>
              <th class="text-nowrap">Kode Alat</th>
              <th>Nama Alat</th>
              <th>Spesifikasi</th>
              <th>Disiapkan Oleh</th>
              <th>Fungsi</th>
              <th class="text-center text-nowrap" style="width: 100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($data)): ?>
              <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data alat.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($data as $row): ?>
                <tr>
                  <td><?= esc($row['kode_alat']) ?></td>
                  <td><?= esc($row['nama_alat']) ?></td>
                  <td><?= esc($row['spesifikasi']) ?></td>
                  <td><?= esc($row['disiapkan_oleh']) ?></td>
                  <td><?= esc($row['fungsi']) ?></td>
                  <td class="text-center">
                    <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal"
                      data-bs-target="#editModal<?= $row['id_alat'] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <a href="<?= base_url('auditor/alat/hapus_alat/' . $row['id_alat']) ?>"
                      class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

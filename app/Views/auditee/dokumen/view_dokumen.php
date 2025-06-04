<style>
  .avatar-sm {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
  }

  .table td,
  .table th {
    vertical-align: middle;
  }
</style>

<div class="container mt-5">
  <div class="card shadow-sm border-0">
    <div class="card-header text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Dokumen Auditee</h5>
      <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kontenModal">
        <i class="fas fa-plus me-1"></i> Tambah Data
      </button>
    </div>
    <div class="card-body px-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0">
          <thead class="table-light text-center">
            <tr>
              <th class="text-nowrap">Kode Dokumen</th>
              <th>Jenis</th>
              <th>Nama</th>
              <th>Deskripsi</th>
              <th>File</th>
              <th class="text-center text-nowrap" style="width: 100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($konten)): ?>
              <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($konten as $row): ?>
                <tr>
                  <td><?= esc($row['kode_dokumen']) ?></td>
                  <td><?= esc($row['jenis']) ?></td>
                  <td><?= esc($row['nama']) ?></td>
                  <td><?= esc($row['deskripsi']) ?></td>
                  <td><?php if (!empty($row['file'])): ?>
                      <a href="<?= base_url('uploads/dokumen/' . $row['file']) ?>" target="_blank"
                        class="btn btn-light btn-sm">
                        Lihat File
                      </a>
                    <?php else: ?>
                      <span class="text-muted">Tidak ada file</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal"
                      data-bs-target="#editModal<?= $row['id_dokumen'] ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <a href="<?= base_url('auditee/delete_dokumen/' . $row['id_dokumen']) ?>"
                      class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal<?= $row['id_dokumen'] ?>" tabindex="-1"
                  aria-labelledby="editModalLabel<?= $row['id_dokumen'] ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <form method="post" action="<?= base_url('auditee/update_dokumen') ?>" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Dokumen</h5>
                          <button type="button" class="btn avatar-sm" data-bs-dismiss="modal"
                            aria-label="Tutup">&times;</button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="id_dokumen" value="<?= $row['id_dokumen'] ?>">
                          <div class="mb-3">
                            <label for="">Kode Dokumen</label>
                            <input type="text" name="kode_dokumen" value="<?= esc($row['kode_dokumen']) ?>"
                              class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label for="">Jenis</label>
                            <input type="text" name="jenis" value="<?= esc($row['jenis']) ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" name="nama" value="<?= esc($row['nama']) ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control"
                              required><?= esc($row['deskripsi']) ?></textarea>
                          </div>
                          <div class="'mb-3">
                            <Label for="">File</Label>
                            <input type="file" name="file" class="form-control" required><?= esc($row['file']) ?>
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti file</small>
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

<!-- Modal Tambah -->
<div class="modal fade" id="kontenModal" tabindex="-1" aria-labelledby="kontenModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('auditee/save_dokumen') ?>" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Dokumen</h5>
          <button type="button" class="btn avatar-sm" data-bs-dismiss="modal" aria-label="Tutup">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Kode Dokumen</label>
            <input type="text" name="kode_dokumen" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Jenis</label>
            <input type="text" name="jenis" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
          </div>
          <div class="mb-3">
            <label for="">File</label>
            <input type="file" name="file" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
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
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Dokumen Auditee</h5>
            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kontenModal">
                <i class="fas fa-plus"></i> Tambah Data
            </button>
        </div>
        <div class="card-body px-0">
            <table class="table table-hover mb-0">
                <thead class="bg-light text-uppercase text-secondary small">
                    <tr>
                        <th>Kode Dokumen</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
<tbody>
  <?php if (empty($konten)): ?>
    <tr><td colspan="4" class="text-center">Belum ada data.</td></tr>
  <?php else: ?>
    <?php foreach ($konten as $row): ?>
      <tr>
        <td><?= $row['kode_dokumen'] ?></td>
        <td><?= $row['jenis'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['deskripsi'] ?></td>
        <td class="text-end">
          <!-- Tombol Edit Modal -->
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_dokumen'] ?>">Edit</button>
          
          <!-- Tombol Hapus -->
          <a href="<?= base_url('auditee/delete_dokumen/' . $row['id_dokumen']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
        </td>
      </tr>

      <!-- Modal Edit -->
      <div class="modal fade" id="editModal<?= $row['id_dokumen'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id_dokumen'] ?>" aria-hidden="true">
        <div class="modal-dialog">
          <form method="post" action="<?= base_url('auditee/update_dokumen') ?>">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="id_dokumen" value="<?= $row['id_dokumen'] ?>">
                <div class="mb-3">
                  <label>Kode Dokumen</label>
                  <input type="text" name="kode_dokumen" value="<?= $row['kode_dokumen'] ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Jenis</label>
                  <input type="text" name="jenis" value="<?= $row['jenis'] ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" required><?= $row['deskripsi'] ?></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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

<!-- Modal Tambah -->
<div class="modal fade" id="kontenModal" tabindex="-1" aria-labelledby="kontenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="<?= base_url('auditee/save_dokumen') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

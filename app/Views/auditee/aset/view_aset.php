<style>
  .table td,
  .table th {
    vertical-align: middle;
  }
</style>

<div class="container mt-5">
  <div class="card shadow-sm border-0">
    <div class="card-header text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Data Aset</h5>
      <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#asetModal">
        <i class="fas fa-plus me-1"></i> Tambah Aset
      </button>
    </div>
    <div class="card-body px-3">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0">
          <thead class="table-light text-center">
            <tr>
              <th>Kode Aset</th>
              <th>Nama Aset</th>
              <th>Jenis</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th>Penyebab</th>
              <th>Dampak</th>
              <th>Nilai Frekuensi</th>
              <th class="text-center text-nowrap" style="width: 100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($asetRisiko as $row): ?>
              <tr>
                <td><?= esc($row['kode_aset']) ?></td>
                <td><?= esc($row['nama_aset']) ?></td>
                <td><?= esc($row['jenis']) ?></td>
                <td><?= esc($row['deskripsi']) ?></td>
                <td><?= esc($row['kategori']) ?></td>
                <td><?= esc($row['penyebab'] ?? '-') ?></td>
                <td><?= esc($row['dampak'] ?? '-') ?></td>
                <td><?= esc($row['nilai_frekuensi'] ?? '-') ?></td>
                <td class="text-center">
                  <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal"
                    data-bs-target="#editModal<?= $row['id_aset'] ?>">
                    <i class="fas fa-edit"></i>
                  </button>
                  <a href="<?= base_url('auditee/delete_aset/' . $row['id_aset']) ?>"
                    class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div class="modal fade" id="editModal<?= $row['id_aset'] ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <form method="post" action="<?= base_url('auditee/update_aset') ?>">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Aset</h5>
                        <button type="button" class="btn avatar-sm" data-bs-dismiss="modal"
                          aria-label="Tutup">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <input type="hidden" name="id_aset" value="<?= $row['id_aset'] ?>">
                          <div class="col-md-6 mb-3">
                            <label>Kode Aset</label>
                            <input type="text" name="kode_aset" value="<?= esc($row['kode_aset']) ?>" class="form-control"
                              required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label>Nama Aset</label>
                            <input type="text" name="nama_aset" value="<?= esc($row['nama_aset']) ?>" class="form-control"
                              required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" class="form-control" required>
                              <option value="">-- Pilih Jenis --</option>
                              <option value="Perangkat Pendukung" <?= $row['jenis'] == 'Perangkat Pendukung' ? 'selected' : '' ?>>Perangkat Pendukung</option>
                              <option value="Perangkat Elektronik portable" <?= $row['jenis'] == 'Perangkat Elektronik portable' ? 'selected' : '' ?>>Perangkat Elektronik portable</option>
                              <option value="Perangkat Elektronik pada Ruang Server" <?= $row['jenis'] == 'Perangkat Elektronik pada Ruang Server' ? 'selected' : '' ?>>Perangkat Elektronik pada Ruang Server
                              </option>
                              <option value="Perangkat Elektronik pada Ruang Admin" <?= $row['jenis'] == 'Perangkat Elektronik pada Ruang Admin' ? 'selected' : '' ?>>Perangkat Elektronik pada Ruang Admin
                              </option>
                              <option value="Peralatan Pendukung" <?= $row['jenis'] == 'Peralatan Pendukung' ? 'selected' : '' ?>>Peralatan Pendukung</option>
                              <option value="Sistem operasi (OS)" <?= $row['jenis'] == 'Sistem operasi (OS)' ? 'selected' : '' ?>>Sistem operasi (OS)</option>
                              <option value="Aplikasi pengamanan lalu lintas jaringan" <?= $row['jenis'] == 'Aplikasi pengamanan lalu lintas jaringan' ? 'selected' : '' ?>>Aplikasi pengamanan lalu lintas
                                jaringan</option>
                              <option value="Aplikasi chat" <?= $row['jenis'] == 'Aplikasi chat' ? 'selected' : '' ?>>
                                Aplikasi
                                chat</option>
                              <option value="Aplikasi back up data" <?= $row['jenis'] == 'Aplikasi back up data' ? 'selected' : '' ?>>Aplikasi back up data</option>
                              <option value="Aplikasi antivirus" <?= $row['jenis'] == 'Aplikasi antivirus' ? 'selected' : '' ?>>Aplikasi antivirus</option>
                              <option value="User" <?= $row['jenis'] == 'User' ? 'selected' : '' ?>>User</option>
                              <option value="Responsible/User" <?= $row['jenis'] == 'Responsible/User' ? 'selected' : '' ?>>
                                Responsible/User</option>
                              <option value="Accountable/Consuled/Informed/User"
                                <?= $row['jenis'] == 'Accountable/Consuled/Informed/User' ? 'selected' : '' ?>>
                                Accountable/Consuled/Informed/User</option>
                            </select>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control"
                              required><?= esc($row['deskripsi']) ?></textarea>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control" required>
                              <option value="Perangkat Keras" <?= $row['kategori'] == 'Perangkat Keras' ? 'selected' : '' ?>>
                                Perangkat Keras</option>
                              <option value="Perangkat Lunak" <?= $row['kategori'] == 'Perangkat Lunak' ? 'selected' : '' ?>>
                                Perangkat Lunak</option>
                              <option value="Sumber Daya Manusia" <?= $row['kategori'] == 'Sumber Daya Manusia' ? 'selected' : '' ?>>Sumber Daya Manusia</option>
                            </select>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label>Penyebab</label>
                            <input type="text" name="penyebab" value="<?= esc($row['penyebab']) ?>" class="form-control"
                              required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label>Dampak</label>
                            <input type="text" name="dampak" value="<?= esc($row['dampak']) ?>" class="form-control"
                              required>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label>Frekuensi</label>
                            <input type="number" name="nilai_frekuensi" value="<?= esc($row['nilai_frekuensi']) ?>"
                              class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary btn-sm">Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Aset -->
<div class="modal fade" id="asetModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('auditee/save_aset') ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Aset</h5>
          <button type="button" class="btn avatar-sm" data-bs-dismiss="modal" aria-label="Tutup">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label>Kode Aset</label>
              <input type="text" name="kode_aset" class="form-control" placeholder="Contoh: AS001" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Nama Aset</label>
              <input type="text" name="nama_aset" class="form-control" placeholder="Contoh: Printer" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="jenis">Jenis</label>
              <select name="jenis" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="Perangkat Pendukung">Perangkat Pendukung</option>
                <option value="Perangkat Elektronik portable">Perangkat Elektronik portable</option>
                <option value="Perangkat Elektronik pada Ruang Server">Perangkat Elektronik pada Ruang Server</option>
                <option value="Perangkat Elektronik pada Ruang Admin">Perangkat Elektronik pada Ruang Admin</option>
                <option value="Peralatan Pendukung">Peralatan Pendukung</option>
                <option value="Sistem operasi (OS)">Sistem operasi (OS)</option>
                <option value="Aplikasi pengamanan lalu lintas jaringan">Aplikasi pengamanan lalu lintas jaringan
                </option>
                <option value="Aplikasi chat">Aplikasi chat</option>
                <option value="Aplikasi back up data">Aplikasi back up data</option>
                <option value="Aplikasi antivirus">Aplikasi antivirus</option>
                <option value="User">User</option>
                <option value="Responsible/User">Responsible/User</option>
                <option value="Accountable/Consuled/Informed/User">Accountable/Consuled/Informed/User</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label>Deskripsi</label>
              <textarea name="deskripsi" class="form-control" placeholder="Enter Deskripsi Aset" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label for="kategori">Kategori</label>
              <select name="kategori" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Perangkat Keras">Perangkat Keras</option>
                <option value="Perangkat Lunak">Perangkat Lunak</option>
                <option value="Sumber Daya Manusia">Sumber Daya Manusia</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label>Penyebab</label>
              <input type="text" name="penyebab" class="form-control" placeholder="Enter Penyebab Aset" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Dampak</label>
              <input type="text" name="dampak" class="form-control" placeholder="Enter Dampak Aset" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Nilai Frekuansi</label>
              <input type="number" name="nilai_frekuensi" class="form-control" placeholder="Enter Nilai Frekuensi" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary btn-sm">Simpan Aset</button>
        </div>
      </div>
    </form>
  </div>
</div>
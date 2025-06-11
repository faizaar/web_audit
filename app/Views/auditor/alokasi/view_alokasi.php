<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <div class="card m-3">
    <div class="card-header pb-0">
      <h6>Data Alokasi</h6>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="d-flex justify-content-between align-items-center px-3 pb-3">
        <h6 class="mb-0">Daftar Alokasi</h6>
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalTambahAlokasi">
          <i class="material-symbols-rounded" style="vertical-align: middle;">add</i> Tambah Alokasi
        </button>
      </div>

      <div class="table-responsive p-3" style="max-height: 500px; overflow-y: auto;">
        <table class="table table-hover table-bordered align-items-start mb-0">
          <thead class="bg-light">
            <tr>
              <th>Kode Alokasi</th>
              <th>Aset</th>
              <th>Risiko</th>
              <th>Kontrol</th>
              <th>Dokumen</th>
              <th>Teknik Pengujian</th>
              <th>Dokumentasi</th>
              <th>Jadwal</th>
              <th>Auditor</th>
              <th>Alat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dataMb as $a): ?>
            <tr>
              <td><?= esc($a['kode_alokasi']) ?></td>
              <td><?= esc($a['kode_aset']) ?></td>
              <td><?= esc($a['kode_risiko']) ?></td>
              <td><?= esc($a['kode_kontrol']) ?></td>
              <td><?= esc($a['id_dokumen']) ?></td>
              <td><?= esc($a['teknik_pengujian']) ?></td>
              <td><?= esc($a['dokumentasi']) ?></td>
              <td><?= esc($a['id_jadwal']) ?></td>
              <td><?= esc($a['id_auditor']) ?></td>
              <td><?= esc($a['kode_alat']) ?></td>
              <td>
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?= base_url('alokasi/hapus_alokasi/' . $a['kode_alokasi']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Alokasi -->
  <div class="modal fade" id="modalTambahAlokasi" tabindex="-1" aria-labelledby="modalTambahAlokasiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <form action="<?= base_url('alokasi/simpan_alokasi') ?>" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTambahAlokasiLabel">Tambah Data Alokasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="kode_alokasi" class="form-label">Kode Alokasi</label>
                <input type="text" class="form-control" name="kode_alokasi" id="kode_alokasi" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Aset</label>
                <select name="kode_aset" class="form-select" required>
                  <option disabled selected>-- Pilih Aset --</option>
                  <?php foreach ($aset as $item): ?>
                    <option value="<?= $item['kode_aset'] ?>"><?= $item['kode_aset'] ?> - <?= $item['nama_aset'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Risiko</label>
                <select name="kode_risiko" class="form-select" required>
                  <option disabled selected>-- Pilih Risiko --</option>
                  <?php foreach ($risiko as $item): ?>
                    <option value="<?= $item['kode_risiko'] ?>"><?= $item['kode_risiko'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Kontrol</label>
                <select name="kode_kontrol" class="form-select" required>
                  <option disabled selected>-- Pilih Kontrol --</option>
                  <?php foreach ($kontrol as $item): ?>
                    <option value="<?= $item['id_kontrol'] ?>"><?= $item['id_kontrol'] ?> - <?= $item['jenis'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Dokumen</label>
                <select name="id_dokumen" class="form-select" required>
                  <option disabled selected>-- Pilih Dokumen --</option>
                  <?php foreach ($dokumen as $item): ?>
                    <option value="<?= $item['id_dokumen'] ?>"><?= $item['id_dokumen'] ?> - <?= $item['nama'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Jadwal</label>
                <select name="id_jadwal" class="form-select" required>
                  <option disabled selected>-- Pilih Jadwal --</option>
                  <?php foreach ($jadwal as $item): ?>
                    <option value="<?= $item['id_kegiatan'] ?>"><?= $item['id_kegiatan'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Auditor</label>
                <select name="id_auditor" class="form-select" required>
                  <option disabled selected>-- Pilih Auditor --</option>
                  <?php foreach ($auditor as $item): ?>
                    <option value="<?= $item['id_auditor'] ?>"><?= $item['id_auditor'] ?> - <?= $item['nama'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Alat</label>
                <select name="kode_alat" class="form-select" required>
                  <option disabled selected>-- Pilih Alat --</option>
                  <?php foreach ($alat as $item): ?>
                    <option value="<?= $item['id_alat'] ?>"><?= $item['id_alat'] ?> - <?= $item['nama_alat'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-12">
                <label for="teknik_pengujian" class="form-label">Teknik Pengujian</label>
                <textarea class="form-control" name="teknik_pengujian" rows="2" required></textarea>
              </div>
              <div class="col-12">
                <label for="dokumentasi" class="form-label">Dokumentasi</label>
                <textarea class="form-control" name="dokumentasi" rows="2" required></textarea>
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

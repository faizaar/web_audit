<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
  <!-- Tambahkan ini di bagian <head> -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <style>
    .audit-step-icon {
      width: 50px;
      height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
    }

    .audit-card {
      transition: transform 0.2s ease;
    }

    .audit-card:hover {
      transform: translateY(-4px);
    }
  </style>

  <!-- Konten Utama -->
  <div class="container-fluid py-4">
    <!-- Header -->
    <!-- Ucapan Selamat Datang dan Deskripsi Sistem -->
    <div class="row mb-4">
      <div class="col-12">
        <div class="card shadow-sm border-0 bg-light">
          <div class="card-body py-4 px-4">
            <h3 class="text-dark mb-2">Selamat datang di Sistem Audit Internal</h3>
            <p class="text-muted mb-1">
              Sistem ini dirancang untuk membantu auditor dalam melaksanakan proses audit secara efisien dan terstruktur.
            </p>
            <p class="text-muted mb-0">
              Silakan ikuti alur audit di bawah ini untuk memulai proses pemeriksaan, penilaian, hingga pelaporan.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Langkah-langkah Audit -->
    <div class="row gy-4 gx-3">

      <!-- Langkah 1 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-primary shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-primary me-3">
              <i class="material-icons">login</i>
            </div>
            <div>
              <h5 class="card-title mb-1">1. Login sebagai Auditor</h5>
              <p class="card-text text-sm text-muted">Masuk ke sistem menggunakan akun auditor untuk mengakses dashboard audit.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 2 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-info shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-info me-3">
              <i class="material-icons">fact_check</i>
            </div>
            <div>
              <h5 class="card-title mb-1">2. Lihat Audit Berjalan</h5>
              <p class="card-text text-sm text-muted">Tinjau daftar kegiatan audit yang sedang berlangsung dan pilih jadwal audit.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 3 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-warning shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-warning me-3">
              <i class="material-icons">calendar_month</i>
            </div>
            <div>
              <h5 class="card-title mb-1">3. Pilih Jadwal Audit</h5>
              <p class="card-text text-sm text-muted">Lihat rincian jadwal, lokasi, dan unit yang akan diaudit sesuai yang ditugaskan.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 4 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-success shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-success me-3">
              <i class="material-icons">inventory</i>
            </div>
            <div>
              <h5 class="card-title mb-1">4. Lihat Aset & Risiko</h5>
              <p class="card-text text-sm text-muted">Telusuri aset penting dan potensi risiko dari auditee yang menjadi fokus audit.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 5 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-danger shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-danger me-3">
              <i class="material-icons">grade</i>
            </div>
            <div>
              <h5 class="card-title mb-1">5. Tambahkan Penilaian</h5>
              <p class="card-text text-sm text-muted">Lakukan pengisian dan penilaian indikator komponen berdasarkan observasi.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 6 -->
      <div class="col-md-6">
        <div class="card audit-card h-100 border-start border-5 border-secondary shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-secondary me-3">
              <i class="material-icons">upload_file</i>
            </div>
            <div>
              <h5 class="card-title mb-1">6. Unggah Dokumen Pendukung</h5>
              <p class="card-text text-sm text-muted">Unggah dokumen sebagai bukti audit atau pilih dari daftar dokumen yang tersedia.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Langkah 7 -->
      <div class="col-md-12">
        <div class="card audit-card h-100 border-start border-5 border-dark shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="audit-step-icon text-dark me-3">
              <i class="material-icons">description</i>
            </div>
            <div>
              <h5 class="card-title mb-1">7. Isi Laporan Audit</h5>
              <p class="card-text text-sm text-muted">Masukkan seluruh temuan dan rekomendasi ke dalam laporan audit akhir.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

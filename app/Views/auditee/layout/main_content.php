<!-- Header Start -->
<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
  <div class="container text-center my-5 py-5">
    <h1 class="text-white mt-4 mb-4">Selamat Datang, <?= session('auditee') ?></h1>
    <h1 class="text-white display-1 mb-5">Layanan Audit Instasi</h1>
    <h5 class="text-white mt-4 mb-4">Pantau status audit, unggah dokumen, dan lihat hasil audit Anda di sini.</h5>
  </div>
</div>


<div class="container p-0">
  <!-- Jumlah Dokumen -->
  <div class="row g-4 justify-content-center">
    <div class="col-md-3">
      <div class="stat-box">
        <div class="stat-icon"><i class="fas fa-file-upload fa-lg"></i></div>
        <div class="stat-value"><?= $total_dokumen ?></div>
        <div class="stat-label">Dokumen<br>Diunggah</div>
      </div>
    </div>
  </div>

  <!-- Bar Chart Risiko -->
  <div class="card mt-4">
    <div class="card-header">
      <h6 class="mb-0">Frekuensi Risiko per Aset</h6>
    </div>
    <div class="card-body">
      <canvas id="frekuensiChart" height="80"></canvas>
    </div>
  </div>

  <!-- Maturity Level - 2 Kolom -->
  <div class="row g-4 mt-4">
    <!-- Kiri: Tabel Maturity -->
    <div class="col-md-6">
      <div class="card h-100">
        <div class="card-header">
          <h6 class="mb-0">Tabel Hasil Analisis Maturity</h6>
        </div>
        <div class="card-body px-3">
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
              <thead class="table-light text-center">
                <tr>
                  <th>Kode</th>
                  <th>Tahapan Audit</th>
                  <th>Maturity Level</th>
                  <th>Maturity Level Maks</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < count($audit); $i++): ?>
                  <tr>
                    <td><?= $audit[$i]['kode_audit'] ?></td>
                    <td><?= $audit[$i]['nama_kegiatan_audit'] ?></td>
                    <td><?= $tabelMaturityLevel[$i]['rata_rata'] ?? '-' ?></td>
                    <td>90</td>
                  </tr>
                <?php endfor; ?>
                <tr>
                  <td><strong>Rata-rata</strong></td>
                  <td></td>
                  <td><strong><?= $AVGLevelGAP['avg_level'] ?></strong></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Kanan: Radar Chart Maturity -->
    <div class="col-md-6">
      <div class="card h-100">
        <div class="card-header">
          <h6 class="mb-0">Radar Maturity Level Audit TI</h6>
        </div>
        <div class="card-body">
          <canvas id="maturityChart" width="400" height="400"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- GAP Maturity - 2 Kolom -->
  <div class="row g-4 mt-4">
    <!-- Kiri: Tabel GAP -->
    <div class="col-md-6">
      <div class="card h-100">
        <div class="card-header">
          <h6 class="mb-0">Tabel Hasil Analisis GAP Maturity</h6>
        </div>
        <div class="card-body px-3">
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
              <thead class="table-light text-center">
                <tr>
                  <th>Kode Audit</th>
                  <th>Tahapan Audit</th>
                  <th>Maturity Level</th>
                  <th>Maturity Level Maks</th>
                  <th>GAP</th>
                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < count($audit); $i++): ?>
                  <tr>
                    <td><?= $audit[$i]['kode_audit'] ?></td>
                    <td><?= $audit[$i]['nama_kegiatan_audit'] ?></td>
                    <td><?= $tabelMaturityLevelGAP[$i]['rata_rata'] ?? '-' ?></td>
                    <td>90</td>
                    <td><?= $tabelMaturityLevelGAP[$i]['gap_analysis'] ?? '-' ?></td>
                  </tr>
                <?php endfor; ?>
                <tr>
                  <td><strong>Rata-rata</strong></td>
                  <td></td>
                  <td><strong><?= $AVGLevelGAP['avg_level'] ?></strong></td>
                  <td></td>
                  <td><strong><?= $AVGLevelGAP['avg_gap'] ?></strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Kanan: Radar Chart GAP -->
    <div class="col-md-6">
      <div class="card h-100">
        <div class="card-header">
          <h6 class="mb-0">Radar GAP Maturity Audit TI</h6>
        </div>
        <div class="card-body">
          <canvas id="gapChart" width="400" height="400"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Bar Chart Script -->
<script>
  const barCtx = document.getElementById('frekuensiChart').getContext('2d');
  new Chart(barCtx, {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_column($chart, 'nama_aset')) ?>,
      datasets: [{
        label: 'Total Frekuensi Risiko',
        data: <?= json_encode(array_column($chart, 'total_frekuensi')) ?>,
        backgroundColor: 'rgba(255, 99, 132, 0.6)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Frekuensi'
          }
        }
      }
    }
  });
</script>

<!-- Radar Chart Script -->
<script>
  const radarCtx = document.getElementById('maturityChart').getContext('2d');
  const jenisAuditLabels = <?= json_encode(array_column($audit, 'kode_audit')) ?>;
  const skorRataRata = <?= json_encode(array_map('floatval', array_column($maturity, 'rata_rata'))) ?>;

  new Chart(radarCtx, {
    type: 'radar',
    data: {
      labels: jenisAuditLabels,
      datasets: [
        {
          label: 'Maturity Level',
          data: skorRataRata,
          fill: true,
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          pointBackgroundColor: 'rgba(54, 162, 235, 1)',
          tension: 0.3
        },
        {
          label: 'Maturity Level Maks',
          data: Array(jenisAuditLabels.length).fill(90),
          fill: false,
          borderColor: 'red',
          pointBackgroundColor: 'red',
          borderWidth: 3
        }
      ]
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Maturity Level',
          font: { size: 20 }
        },
        legend: { position: 'top' }
      },
      scales: {
        r: {
          suggestedMin: 0,
          suggestedMax: 100,
          ticks: { stepSize: 20 }
        }
      }
    }
  });
</script>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctxGap = document.getElementById('gapChart').getContext('2d');

  const labels = <?= json_encode(array_column($audit, 'kode_audit')) ?>;
  const gap = <?= json_encode(array_map('floatval', array_column($gap, 'gap_analysis'))) ?>;
  const maks = <?= json_encode(array_map('floatval', array_column($gap, 'skor_maksimal'))) ?>;

  new Chart(ctxGap, {
    type: 'radar',
    data: {
      labels: labels,
      datasets: [
        {
          label: 'Gap Analysis',
          data: gap,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          pointBackgroundColor: 'rgba(255, 99, 132, 1)'
        },
        {
          label: 'Skor Maksimal',
          data: maks,
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2,
          fill: false,
          pointBackgroundColor: 'rgba(75, 192, 192, 1)'
        }
      ]
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Radar Chart: Gap Analysis',
          font: { size: 18 }
        },
        legend: {
          position: 'top'
        }
      },
      scales: {
        r: {
          suggestedMin: 0,
          suggestedMax: 100,
          ticks: {
            stepSize: 20
          }
        }
      }
    }
  });
</script>
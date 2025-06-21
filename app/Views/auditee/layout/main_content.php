<!-- Header Start -->
<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center my-5 py-5">
        <h1 class="text-white mt-4 mb-4">Selamat Datang, <?= session('auditee') ?></h1>
        <h1 class="text-white display-1 mb-5">Layanan Audit Instasi</h1>
        <h5 class="text-white mt-4 mb-4">Pantau status audit, unggah dokumen, dan lihat hasil audit Anda di sini.</h5>
    </div>
</div>
<!-- Card Info Start -->
<div class="container py-5">
    <div class="row g-4 justify-content-center">
        <!-- Dokumen Diunggah -->
        <div class="col-md-3 ">
            <div class="stat-box">
                <div class="stat-icon"><i class="fas fa-file-upload fa-lg"></i></div>
                <div class="stat-value"><?= $total_dokumen ?></div>
                <div class="stat-label">Dokumen<br>Diunggah</div>
            </div>
        </div>

        <!-- Status Diterima -->
        <!-- <div class="col-md-3">
            <div class="stat-box">
                <div class="stat-icon"><i class="fas fa-check-circle fa-lg"></i></div>
                <div class="stat-value">10</div>
                <div class="stat-label">Status<br>Diterima</div>
            </div>
        </div> -->

        <!-- Menunggu Review -->
        <!-- <div class="col-md-3">
            <div class="stat-box">
                <div class="stat-icon"><i class="fas fa-clock fa-lg"></i></div>
                <div class="stat-value"></div>
                <div class="stat-label">Menunggu<br>Review</div>
            </div>
        </div> -->
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h6 class="mb-0">Frekuensi Risiko per Aset</h6>
        </div>
        <div class="card-body">
            <canvas id="frekuensiChart" height="80"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('frekuensiChart').getContext('2d');
    new Chart(ctx, {
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
                    title: { display: true, text: 'Frekuensi' }
                }
            }
        }
    });
</script>
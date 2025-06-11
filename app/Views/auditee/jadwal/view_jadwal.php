<!-- Jadwal Table Start -->
<div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-header text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Jadwal Audit</h5>
            </div>
            <div class="card-body px-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-light text-center">
                            <tr>
                                <th class="text-nowrap">ID Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Hari / Tanggal</th>
                                <th>Jam</th>
                                <th>Target Luaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataMb as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id_kegiatan']) ?></td>
                                    <td><?= htmlspecialchars($row['nama_kegiatan']) ?></td>
                                    <td><?= htmlspecialchars($row['hari_tanggal']) ?></td>
                                    <td><?= htmlspecialchars($row['jam']) ?></td>
                                    <td><?= htmlspecialchars($row['target_luaran']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if (empty($dataMb)): ?>
                        <div class="text-center text-muted mt-3">Belum ada data jadwal audit.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
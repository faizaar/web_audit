<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Hasil Penilaian Aset</h5>
        </div>
        <div class="card-body px-3">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Aset</th>
                            <th>Risiko</th>
                            <th>Indikator</th>
                            <th>Level Terpenuhi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($hasil_penilaian)): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada hasil penilaian.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($hasil_penilaian as $row): ?>
                                <tr>
                                    <td><?= esc($row['aset']) ?></td>
                                    <td><?= esc($row['risiko']) ?></td>
                                    <td><?= esc($row['indikator']) ?></td>
                                    <td><?= esc($row['level_terpenuhi']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

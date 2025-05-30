<div
  style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); border: 1px solid #ddd;">
  <h4 style="margin-bottom: 20px; font-weight: 600; color: #333;"><i class="fa fa-user-shield text-primary mr-2"></i>
    Data Auditee</h4>

  <form>
    <div class="form-group mb-3">
      <label for="auditee" style="font-weight: 500;">Auditee</label>
      <input type="text" id="auditee" class="form-control" value="<?= $auditee['auditee']; ?>" readonly>
    </div>

    <div class="form-group mb-3">
      <label for="jabatan" style="font-weight: 500;">Jabatan</label>
      <input type="text" id="jabatan" class="form-control" value="<?= $auditee['jabatan']; ?>" readonly>
    </div>

    <div class="form-group mb-3">
      <label for="kategori" style="font-weight: 500;">Kategori</label>
      <input type="text" id="kategori" class="form-control" value="<?= $auditee['kategori']; ?>" readonly>
    </div>

    <div class="form-group mb-0">
      <label for="keterangan" style="font-weight: 500;">Keterangan</label>
      <textarea id="keterangan" class="form-control" rows="3" readonly><?= $auditee['keterangan']; ?></textarea>
    </div>
  </form>
</div>
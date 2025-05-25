  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
<!-- <link id="pagestyle" href="../../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />  -->

<div style="max-width: 600px; margin: 0 auto; border: 1px solid #ddd; border-radius: 10px; padding: 20px; background: #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
  <div style="display: flex; align-items: center; margin-bottom: 20px;">
    <div>
      <h3 style="margin: 0; font-size: 20px; color: #333;"><?= $auditee['auditee']; ?></h3>
      <p style="margin: 5px 0 0; color: #666; font-size: 14px;"><?= $auditee['jabatan']; ?></p>
    </div>
  </div>

  <table style="width: 100%; font-size: 14px; color: #333;">
    <tr>
      <td style="width: 120px; font-weight: bold;">Auditee</td>
      <td>: <?= $auditee['auditee']; ?></td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Jabatan</td>
      <td>: <?= $auditee['jabatan']; ?></td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Kategori</td>
      <td>: <?= $auditee['kategori']; ?></td>
    </tr>
    <tr>
      <td style="font-weight: bold;">Keterangan</td>
      <td>: <?= $auditee['keterangan']; ?></td>
    </tr>
  </table>
</div>


 

<?php

namespace App\Controllers;

use App\Models\Model_alatauditor;
use App\Models\model_asetauditor;
use App\Models\Model_auditauditor;
use App\Models\model_dokumenauditor;
use App\Models\model_komponenauditor;
use App\Models\Model_risiko;
use App\Models\model_jadwalauditor;
use App\Models\Model_laporan_hasil;
use App\Models\Model_alokasi;
use App\Models\model_auditor;

class auditor extends BaseController
{
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'))->with('message', 'Berhasil logout.');
    }
    public function view_auditor()
    {
        $modelJadwal = new model_jadwalauditor();
        $modelDokumen = new model_dokumenauditor(); // pastikan model ini ada
        $modelAset = new model_asetauditor();       // pastikan model ini ada

        $total_dokumen = $modelDokumen->countAll();
        $total_aset = $modelAset->countAll();

        $data = [
            'total_dokumen' => $total_dokumen,
            'total_aset' => $total_aset,
            'jadwal_terdekat' => $modelJadwal->getJadwalTerdekat()
        ];

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/dashboard', $data);
        echo view('auditor/layout/auditor_footer');
    }


    public function view_alat()
    {
        $model = new Model_alatauditor();
        $data['dataMb'] = $model->paginate(20, 'alat');
        $data['pager'] = $model->pager;
        $data['currentPage'] = $model->pager->getCurrentPage('alat');

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/alat/view_alat', $data);
        echo view('auditor/layout/auditor_footer');
    }

    public function store_alat()
    {
        $model = new Model_alatauditor();
        $data = [
            'kode_alat' => $this->request->getPost('kode_alat'),
            'nama_alat' => $this->request->getPost('nama_alat'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'disiapkan_oleh' => $this->request->getPost('disiapkan_oleh'),
            'fungsi' => $this->request->getPost('fungsi'),
        ];
        $model->insert($data); // perbaiki: gunakan `insert()` bawaan model CI
        return redirect()->to('/auditor/alat');
    }

    public function edit_alat($id)
    {
        $model = new Model_alatauditor();
        $data['alat'] = $model->getAlatById($id);

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/alat/edit_alat', $data);
        echo view('auditor/layout/auditor_footer');
    }

    public function update_alat($id)
    {
        $model = new Model_alatauditor();
        $data = [
            'kode_alat' => $this->request->getPost('kode_alat'),
            'nama_alat' => $this->request->getPost('nama_alat'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'disiapkan_oleh' => $this->request->getPost('disiapkan_oleh'),
            'fungsi' => $this->request->getPost('fungsi'),
        ];
        $model->update($id, $data); // gunakan method `update()` model CI
        return redirect()->to('/auditor/alat');
    }

    public function delete_alat($id)
    {
        $model = new Model_alatauditor();
        $model->delete($id); // gunakan method `delete()` model CI
        return redirect()->to('/auditor/alat');
    }


    public function view_audit()
    {
        $mb = new model_auditauditor();
        $datamb = $mb->tampilaudit();
        $data = array('dataMb' => $datamb, );

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/audit/view_audit', $data);
        echo view('auditor/layout/auditor_footer');
    }

    //Controller jadwal 
    public function view_jadwal()
    {
        $mb = new model_jadwalauditor();
        $datamb = $mb->tampiljadwal();
        $data = array('dataMb' => $datamb, );

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/jadwal/view_jadwal', $data);
        echo view('auditor/layout/auditor_footer');
    }
    public function tambah_jadwal()
{
    $data = [
        'id_kegiatan'    => $this->request->getPost('id_kegiatan'),
        'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
        'hari_tanggal'  => $this->request->getPost('hari_tanggal'),
        'jam'            => $this->request->getPost('jam'),
        'target_luaran' => $this->request->getPost('target_luaran'),
        'id_auditee'     => session()->get('id_auditee')  // Sesuaikan dengan ID Auditee
    ];

    $mb = new model_jadwalauditor();
    $mb->insert($data);
    return redirect()->to(base_url('auditor/jadwal'));
}

public function edit_jadwal()
{
    $id_jadwal = $this->request->getPost('id_jadwal');
    $data = [
        'nama_kegiatan' => $this->request->getPost('nama_kegiatan'),
        'hari_tanggal'  => $this->request->getPost('hari_tanggal'),
        'jam'            => $this->request->getPost('jam'),
        'target_luaran' => $this->request->getPost('target_luaran')
    ];

    $mb = new model_jadwalauditor();
    $mb->update($id_jadwal, $data);
    return redirect()->to(base_url('auditor/jadwal'));
}

public function hapus_jadwal($id_jadwal)
{
    $mb = new model_jadwalauditor();
    $mb->delete($id_jadwal);
    return redirect()->to(base_url('auditor/jadwal'));
}

    //CONTROLLER RESIKO 

    public function view_risiko()
    {
        $risikoModel = new model_risiko();
        $asetModel = new model_asetauditor();

        $data = [
            'dataMb' => $risikoModel->tampilRisiko(),
            'aset'   => $asetModel->findAll()
        ];

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/resiko/view_risiko', $data);
        echo view('auditor/layout/auditor_footer');
    }

    public function simpan_risiko()
    {
        $model = new model_risiko();

        $data = [
            'kode_risiko' => $this->request->getPost('kode_risiko'),
            'kode_aset' => $this->request->getPost('kode_aset'),
            'penyebab' => $this->request->getPost('penyebab'),
            'dampak' => $this->request->getPost('dampak'),
            'nilai_frekuensi' => $this->request->getPost('nilai_frekuensi'),
            'nilai_risiko' => $this->request->getPost('nilai_risiko'),
            'total_frekuensi_risiko' => $this->request->getPost('total_frekuensi_risiko'),
            'mitigasi_penyebab' => $this->request->getPost('mitigasi_penyebab'),
            'mitigasi_dampak' => $this->request->getPost('mitigasi_dampak'),
        ];

        $model->insertData($data);
        return redirect()->to(base_url('auditor/resiko'))->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit_risiko($kode_risiko)
    {
        $model = new model_risiko();
        $asetModel = new model_asetauditor();

        $data = [
            'risiko' => $model->getRisikoById($kode_risiko),
            'aset'   => $asetModel->findAll()
        ];

        if (!$data['risiko']) {
            return redirect()->to('auditor/resiko')->with('error', 'Data tidak ditemukan');
        }

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/resiko/edit_risiko', $data);
        echo view('auditor/layout/auditor_footer');
    }

    public function update_risiko()
    {
        $model = new model_risiko();
        $kode_risiko = $this->request->getPost('kode_risiko');

        $data = [
            'kode_aset' => $this->request->getPost('kode_aset'),
            'penyebab' => $this->request->getPost('penyebab'),
            'dampak' => $this->request->getPost('dampak'),
            'nilai_frekuensi' => $this->request->getPost('nilai_frekuensi'),
            'nilai_risiko' => $this->request->getPost('nilai_risiko'),
            'total_frekuensi_risiko' => $this->request->getPost('total_frekuensi_risiko'),
            'mitigasi_penyebab' => $this->request->getPost('mitigasi_penyebab'),
            'mitigasi_dampak' => $this->request->getPost('mitigasi_dampak'),
        ];

        $model->updateData($kode_risiko, $data);
        return redirect()->to('auditor/resiko')->with('success', 'Data risiko berhasil diperbarui');
    }

    public function hapus_risiko($kode_risiko)
    {
        $model = new model_risiko();
        $model->deleteData($kode_risiko);
        return redirect()->to('auditor/resiko')->with('success', 'Data risiko berhasil dihapus');
    }

     // Laporan Hasil Audir
     public function view_tampilan_hasil()
     {
         $modelLaporan = new model_laporan_hasil();
         $modelAudit = new model_auditauditor(); // pastikan model ini ada
     
         $data = [
             'dataMb' => $modelLaporan->tampilLaporan(),
             'dataAudit' => $modelAudit->findAll() // ambil semua kode_audit dari tabel audit
         ];
     
         echo view('auditor/layout/auditor_header');
         echo view('auditor/layout/auditor_nav');
         echo view('auditor/Laporan_hasil/view_laporan_hasil', $data);
         echo view('auditor/layout/auditor_footer');
     }
     
    public function simpan_laporan()
{
    $model = new model_laporan_hasil();
    $data = [
        'kode_audit'         => $this->request->getPost('kode_audit'),
        'temuan'             => $this->request->getPost('temuan'),
        'rekomendasi'        => $this->request->getPost('rekomendasi'),
        'rencana'            => $this->request->getPost('rencana'),
        'target_realisasi'   => $this->request->getPost('target_realisasi'),
        'rencana_pelaksana'  => $this->request->getPost('rencana_pelaksana'),
        'tanggal'            => $this->request->getPost('tanggal'),
        'nama_jabatan'       => $this->request->getPost('nama_jabatan'),
    ];

    $model->insertData($data);
    return redirect()->to(base_url('auditor/laporan_hasil'))->with('success', 'Data berhasil disimpan.');
}

public function update_laporan()
{
    $model = new model_laporan_hasil();
    $id = $this->request->getPost('id');

    $data = [
        'kode_audit'         => $this->request->getPost('kode_audit'),
        'temuan'             => $this->request->getPost('temuan'),
        'rekomendasi'        => $this->request->getPost('rekomendasi'),
        'rencana'            => $this->request->getPost('rencana'),
        'target_realisasi'   => $this->request->getPost('target_realisasi'),
        'rencana_pelaksana'  => $this->request->getPost('rencana_pelaksana'),
        'tanggal'            => $this->request->getPost('tanggal'),
        'nama_jabatan'       => $this->request->getPost('nama_jabatan'),
    ];

    $model->updateData($id, $data);
    return redirect()->to(base_url('auditor/laporan_hasil'))->with('success', 'Data berhasil diupdate.');
}

public function hapus_laporan($id)
{
    $model = new model_laporan_hasil();
    $model->deleteData($id);
    return redirect()->to(base_url('auditor/laporan_hasil'))->with('success', 'Data berhasil dihapus.');
}

public function view_dokumen()
{
    $model = new model_dokumenauditor();  // Ensure the model is correctly loaded

    // Paginate 20 records per page
    $data['dataMb'] = $model->paginate(20, 'dokumen');  // This fetches data with pagination
    $data['pager'] = $model->pager;  // Pagination helper
    $data['currentPage'] = $model->pager->getCurrentPage('dokumen');  // Current page

    // Load the necessary views and pass the data
    echo view('auditor/layout/auditor_header');
    echo view('auditor/layout/auditor_nav');
    echo view('auditor/dokumen/view_dokumen', $data);  // Pass the data here
    echo view('auditor/layout/auditor_footer');
}


    public function view_aset()
    {
        $model = new model_asetauditor();
        $data['dataMb'] = $model->paginate(20, 'aset'); // 20 data per halaman
        $data['pager'] = $model->pager;
        $data['currentPage'] = $model->pager->getCurrentPage('aset');


        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/aset/view_aset', $data);
        echo view('auditor/layout/auditor_footer');
    }

    // View Komponen
    public function view_komponen()
    {
        $model = new model_komponenauditor();
        $data['dataMb'] = $model->paginate(20, 'komponen'); // 20 data per halaman
        $data['pager'] = $model->pager;
        $data['currentPage'] = $model->pager->getCurrentPage('komponen');

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/komponen_penilaian/view_komponenpenilaian', $data);
        echo view('auditor/layout/auditor_footer');
    }
    public function simpan_komponen()
{
    $model = new model_komponenauditor();

    $data = $this->request->getPost();
    $model->insertKomponen($data);

    return redirect()->to(base_url('auditor/komponen'));
}

public function update_komponen()
{
    $model = new model_komponenauditor();
    $id = $this->request->getPost('id_kontrol');
    $data = $this->request->getPost();
    unset($data['id_kontrol']); // jangan update primary key

    $model->updateKomponen($id, $data);
    return redirect()->to(base_url('auditor/komponen'));
}

public function hapus_komponen($id)
{
    $model = new model_komponenauditor();
    $model->deleteKomponen($id);
    return redirect()->to(base_url('auditor/komponen'));
}


    //view alokasi 
    public function view_alokasi()
    {
        $model = new Model_alokasi();
        $data['alokasi'] = $model->tampilAlokasi();

        $data['aset']     = (new model_asetauditor())->findAll();
        $data['risiko']   = (new Model_risiko())->findAll();
        $data['kontrol']  = (new model_komponenauditor())->findAll();
        $data['dokumen']  = (new model_dokumenauditor())->findAll();
        $data['jadwal']   = (new model_jadwalauditor())->findAll();
        $data['auditor']  = (new model_auditor())->findAll();
        $data['alat']     = (new Model_alatauditor())->findAll();

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/alokasi/view_alokasi', $data);
        echo view('auditor/layout/auditor_footer');
    }

    public function simpan_alokasi()
    {
        $model = new Model_alokasi();
    
        // Data yang akan disimpan
        $data = [
            'kode_alokasi'         => $this->request->getPost('kode_alokasi'),
            'id_aset'            => $this->request->getPost('id_aset'),
            'kode_risiko'          => $this->request->getPost('kode_risiko'),
            'kode_kontrol'         => $this->request->getPost('kode_kontrol'),
            'id_dokumen'           => $this->request->getPost('id_dokumen'),  // Simpan dokumen jika ada
            'penilaian_level'      => $this->request->getPost('penilaian_level'),
            'teknik_pengujian'     => $this->request->getPost('teknik_pengujian'),
            'id_jadwal'            => $this->request->getPost('id_jadwal'),
            'id_auditor'           => $this->request->getPost('id_auditor'),
            'kode_alat'            => $this->request->getPost('kode_alat'),
        ];
    
        $model->insertData($data);
        return redirect()->to(base_url('auditor/alokasi'))->with('success', 'Data alokasi berhasil ditambahkan.');
    }
    
    // Mengedit data alokasi berdasarkan ID
    public function edit_alokasi($kode_alokasi)
    {
        $model = new Model_alokasi();
        $data['alokasi'] = $model->getAlokasiById($kode_alokasi);

        if (!$data['alokasi']) {
            return redirect()->to('auditor/view_alokasi')->with('error', 'Data tidak ditemukan');
        }

        $data['aset']     = (new Model_aset())->findAll();
        $data['risiko']   = (new Model_risiko())->findAll();
        $data['kontrol']  = (new Model_komponenpenilaian())->findAll();
        $data['dokumen']  = (new Model_dokumen())->findAll();
        $data['jadwal']   = (new Model_jadwal())->findAll();
        $data['auditor']  = (new Model_akun_auditor())->findAll();
        $data['alat']     = (new Model_alat())->findAll();

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/alokasi/edit_alokasi', $data);
        echo view('auditor/layout/auditor_footer');
    }

    // Memperbarui data alokasi
    public function update_alokasi()
{
    $model = new Model_alokasi();
    $kode_alokasi = $this->request->getPost('kode_alokasi');

    $data = [
        'id_aset'            => $this->request->getPost('id_aset'),
        'kode_risiko'          => $this->request->getPost('kode_risiko'),
        'kode_kontrol'         => $this->request->getPost('kode_kontrol'),
        'id_dokumen'           => $this->request->getPost('id_dokumen'),
        'teknik_pengujian'     => $this->request->getPost('teknik_pengujian'),
        'id_jadwal'            => $this->request->getPost('id_jadwal'),
        'id_auditor'           => $this->request->getPost('id_auditor'),
        'kode_alat'            => $this->request->getPost('kode_alat'),
    ];

    $model->updateData($kode_alokasi, $data);
    return redirect()->to('auditor/alokasi')->with('success', 'Data alokasi berhasil diperbarui.');
}


    // Menghapus data alokasi
    public function hapus_alokasi($kode_alokasi)
    {
        $model = new Model_alokasi();
        $model->deleteData($kode_alokasi);
        return redirect()->to('auditor/alokasi')->with('success', 'Data alokasi berhasil dihapus.');
    }

}

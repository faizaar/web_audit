<?php

namespace App\Controllers;

use App\Models\Model_alatauditor;
use App\Models\model_asetauditor;
use App\Models\Model_auditauditor;
use App\Models\model_dokumenauditor;
use App\Models\model_komponenauditor;
use App\Models\Model_risiko;
use App\Models\Model_laporan_hasil;
use App\Models\Model_alokasi;


class auditor extends BaseController
{ 
   public function view_auditor()
    {
        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/dashboard');
        echo view('auditor/layout/auditor_footer');
    }

    public function view_alat()
    {
        $mb = new Model_alatauditor();
        $datamb = $mb->tampilalat();
        $data = array('dataMb'=> $datamb,); 

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/alat/view_alat',$data);
        echo view('auditor/layout/auditor_footer');
    }

    public function view_audit()
    {
        $mb = new model_auditauditor();
        $datamb = $mb->tampilaudit();
        $data = array('dataMb'=> $datamb,); 

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/audit/view_audit',$data);
        echo view('auditor/layout/auditor_footer');
    }

    //CONTROLLER RESIKO 

    public function view_risiko()
    {
        $mb = new model_risiko();
        $datamb = $mb->tampilrisiko();
        $data = array('dataMb'=> $datamb,); 

        $modelAset = new model_asetauditor(); // Pastikan model ini sudah dibuat
    $data = [
        'dataMb' => $datamb,
        'aset' => $modelAset->findAll()
    ];

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/resiko/view_risiko',$data);
        echo view('auditor/layout/auditor_footer');
    }
    public function tambah_risiko()
    {
    echo view('auditor/layout/auditor_header');
    echo view('auditor/layout/auditor_nav');
    echo view('auditor/layout/auditor_footer');
    }

    public function simpan_risiko()
    {
    $model = new Model_risiko();
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
    return redirect()->to('/auditor/resiko')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit_risiko($kode_risiko)
    {
    $model = new Model_risiko();
    $data['risiko'] = $model->getRisikoById($kode_risiko);

    if (!$data['risiko']) {
        return redirect()->to('auditor/risiko')->with('error', 'Data tidak ditemukan');
    }

    echo view('auditor/layout/auditor_header');
    echo view('auditor/layout/auditor_nav');
    echo view('auditor/resiko/edit_risiko', $data);
    echo view('auditor/layout/auditor_footer');
    }

    public function update_risiko()
    {
    $model = new Model_risiko();
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
    return redirect()->to('auditor/risiko')->with('success', 'Data risiko berhasil diperbarui');
    }

    public function hapus_risiko($kode_risiko)
    {
    $model = new Model_risiko();
    $model->deleteData($kode_risiko);
    return redirect()->to('auditor/risiko')->with('success', 'Data risiko berhasil dihapus');
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
        $mb = new model_dokumenauditor();
        $datamb = $mb->tampildokumen();
        $data = array('dataMb'=> $datamb,); 

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/dokumen/view_dokumen',$data);
        echo view('auditor/layout/auditor_footer');
    }

    public function view_aset()
    {
        $mb = new model_asetauditor();
        $datamb = $mb->tampilaset();
        $data = array('dataMb'=> $datamb,); 

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/aset/view_aset',$data);
        echo view('auditor/layout/auditor_footer');
    }

    // View Komponen
    public function view_komponen()
    {
        $mb = new model_komponenauditor();
        $datamb = $mb->tampilkomponen();
        $data = array('dataMb'=> $datamb,); 

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/komponen_penilaian/view_komponenpenilaian',$data);
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

        $data['aset']     = (new Model_aset())->findAll();
        $data['risiko']   = (new Model_risiko())->findAll();
        $data['kontrol']  = (new Model_komponenpenilaian())->findAll();
        $data['dokumen']  = (new Model_dokumen())->findAll();
        $data['jadwal']   = (new Model_jadwal())->findAll();
        $data['auditor']  = (new Model_akun_auditor())->findAll();
        $data['alat']     = (new Model_alat())->findAll();

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/alokasi/view_alokasi', $data);
        echo view('auditor/layout/auditor_footer');
    }

    // Menyimpan data baru
    public function simpan_alokasi()
    {
        $model = new Model_alokasi();
        $data = [
            'kode_alokasi'         => $this->request->getPost('kode_alokasi'),
            'kode_aset'            => $this->request->getPost('kode_aset'),
            'kode_risiko'          => $this->request->getPost('kode_risiko'),
            'kode_kontrol'         => $this->request->getPost('kode_kontrol'),
            'id_dokumen'           => $this->request->getPost('id_dokumen'),
            'teknik_pengujian'     => $this->request->getPost('teknik_pengujian'),
            'dokumentasi'          => $this->request->getPost('dokumentasi'),
            'id_jadwal'            => $this->request->getPost('id_jadwal'),
            'id_auditor'           => $this->request->getPost('id_auditor'),
            'kode_alat'            => $this->request->getPost('kode_alat'),
        ];

        $model->insertData($data);
        return redirect()->to('/alokasi')->with('success', 'Data alokasi berhasil ditambahkan.');
    }

    // Mengedit data alokasi berdasarkan ID
    public function edit_alokasi($kode_alokasi)
    {
        $model = new Model_alokasi();
        $data['alokasi'] = $model->getAlokasiById($kode_alokasi);

        if (!$data['alokasi']) {
            return redirect()->to('/alokasi')->with('error', 'Data tidak ditemukan');
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
            'kode_aset'            => $this->request->getPost('kode_aset'),
            'kode_risiko'          => $this->request->getPost('kode_risiko'),
            'kode_kontrol'         => $this->request->getPost('kode_kontrol'),
            'id_dokumen'           => $this->request->getPost('id_dokumen'),
            'teknik_pengujian'     => $this->request->getPost('teknik_pengujian'),
            'dokumentasi'          => $this->request->getPost('dokumentasi'),
            'id_jadwal'            => $this->request->getPost('id_jadwal'),
            'id_auditor'           => $this->request->getPost('id_auditor'),
            'kode_alat'            => $this->request->getPost('kode_alat'),
        ];

        $model->updateData($kode_alokasi, $data);
        return redirect()->to('/alokasi')->with('success', 'Data alokasi berhasil diperbarui.');
    }

    // Menghapus data alokasi
    public function hapus_alokasi($kode_alokasi)
    {
        $model = new Model_alokasi();
        $model->deleteData($kode_alokasi);
        return redirect()->to('/alokasi')->with('success', 'Data alokasi berhasil dihapus.');
    }

}

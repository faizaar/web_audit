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
        $data['dataMb'] = $model->paginate(20, 'alat'); // 20 data per halaman
        $data['pager'] = $model->pager;
        $data['currentPage'] = $model->pager->getCurrentPage('alat');

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/alat/view_alat', $data);
        echo view('auditor/layout/auditor_footer');
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

    public function view_risiko()
    {
        $mb = new Model_risiko();
        $datamb = $mb->tampilrisiko();
        $data = array('dataMb' => $datamb, );

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/resiko/view_risiko', $data);
        echo view('auditor/layout/auditor_footer');
    }

    public function view_tampilan_hasil()
    {
        $mb = new model_laporan_hasil();
        $datamb = $mb->tampil_laporan_hasil();
        $data = array('dataMb' => $datamb, );

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/Laporan_hasil/view_laporan_hasil', $data);
        echo view('auditor/layout/auditor_footer');
    }

    public function view_dokumen()
    {
        $model = new model_dokumenauditor();
        $data['dataMb'] = $model->paginate(20, 'dokumen'); // 20 data per halaman
        $data['pager'] = $model->pager;
        $data['currentPage'] = $model->pager->getCurrentPage('dokumen');

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/dokumen/view_dokumen', $data);
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
}

<?php

namespace App\Controllers;

use App\Models\Model_alatauditor;
use App\Models\Model_auditauditor;
use App\Models\Model_risiko;
use App\Models\Model_laporan_hasil;


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

    public function view_risiko()
    {
        $mb = new Model_risiko();
        $datamb = $mb->tampilrisiko();
        $data = array('dataMb'=> $datamb,); 

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/resiko/view_risiko',$data);
        echo view('auditor/layout/auditor_footer');
    }

    public function view_tampilan_hasil()
    {
        $mb = new model_laporan_hasil();
        $datamb = $mb->tampil_laporan_hasil();
        $data = array('dataMb'=> $datamb,); 

        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/Laporan_hasil/view_laporan_hasil',$data);
        echo view('auditor/layout/auditor_footer');
    }
}

<?php

namespace App\Controllers;

use App\Models\Model_alatauditor;

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
}

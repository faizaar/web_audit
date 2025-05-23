<?php

namespace App\Controllers;

use App\Models\model_auditee;
use App\Models\model_jadwalauditor;
use CodeIgniter\Session\Session;

class auditee extends BaseController
{ 
   public function view_auditee()
    {
        echo view('auditee/layout/header');
        echo view('auditee/layout/main_content');
        echo view('auditee/layout/footer');
    }

    public function form_login()
    {
        echo view('auditee/login/form_login');
    }

    public function login()
    {
        $nip = $this->request->getPost('nip');
        $model = new Model_auditee();
        $auditee = $model->cek_login($nip);

        if ($auditee) {
            // Simpan data di session
            session()->set([
                'id_auditee' => $auditee['id_auditee'],
                'NIP'        => $auditee['NIP'],
                'auditee'    => $auditee['auditee'],
                'logged_in'  => true
            ]);
            return redirect()->to(base_url('auditee/dashboard')); // Ganti dengan halaman utama auditee
        } else {
            return redirect()->back()->with('error', 'NIP tidak ditemukan!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auditee/form_login');
    }

    public function view_jadwal() 
    {
        $mb = new model_jadwalauditor();
        $datamb = $mb->tampiljadwal();
        $data = array('dataMb'=> $datamb,); 

        echo view('auditee/layout/header');
        echo view('auditee/jadwal/view_jadwal', $data);
        echo view('auditee/layout/footer');
    }


}

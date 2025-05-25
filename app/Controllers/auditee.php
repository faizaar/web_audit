<?php

namespace App\Controllers;

use App\Models\model_auditee;
use App\Models\model_dokumenauditor;
use App\Models\model_jadwalauditor;
use CodeIgniter\Session\Session;

class auditee extends BaseController
{
    public function view_auditee()
    {
        $id = session()->get('id_auditee');
        $model = new model_auditee();
        $id = session()->get('auditee_id'); // Ambil dari session
        $data['auditee'] = $model->getProfile($id); // Ambil data auditee

        echo view('auditee/layout/header');
        echo view('auditee/layout/main_content', $data);
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
                'NIP' => $auditee['NIP'],
                'auditee' => $auditee['auditee'],
                'logged_in' => true
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
        $data = array('dataMb' => $datamb, );

        echo view('auditee/layout/header');
        echo view('auditee/jadwal/view_jadwal', $data);
        echo view('auditee/layout/footer');
    }

    public function view_akun()
    {
        // ✅ Ambil ID dari session login
        $id = session()->get('id_auditee');

        // ✅ Cek apakah ID valid
        if (!$id) {
            return redirect()->to(base_url('auditee/login'))->with('error', 'Anda belum login.');
        }

        // ✅ Ambil data dari database
        $model = new model_auditee();
        $data['auditee'] = $model->getProfile($id);

        // ✅ Jika data tidak ditemukan
        if (!$data['auditee']) {
            return redirect()->back()->with('error', 'Data profil tidak ditemukan.');
        }

        // ✅ Tampilkan ke view
        echo view('auditee/layout/header');
        echo view('auditee/akun/akun_auditee', $data);
        echo view('auditee/layout/footer');
    }


    public function form_dokumen()
    {
        $id = session()->get('id_auditee'); // ambil dari session login
        $model = new model_dokumenauditor();

        $data['konten'] = $model->tampildokumen_byeid($id); // ✅ sesuai login

        echo view('auditee/layout/header');
        echo view('auditee/dokumen/view_dokumen', $data);
        echo view('auditee/layout/footer');
    }


    public function save_dokumen()
    {
        $model = new model_dokumenauditor();
        $model->save([
            'id_auditee' => session()->get('id_auditee'),
            'kode_dokumen' => $this->request->getPost('kode_dokumen'),
            'jenis' => $this->request->getPost('jenis'),
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to(base_url('auditee/dokumen'));
    }


    public function edit_dokumen($id_dokumen)
    {
        $model = new model_dokumenauditor();
        $data['dokumen'] = $model->getDokumenById($id_dokumen);

        echo view('auditee/layout/header');
        echo view('auditee/dokumen/view_dokumen', $data); // atau arahkan ke view utama dengan modal
        echo view('auditee/layout/footer');
    }

public function update_dokumen()
{
    $id = $this->request->getPost('id_dokumen');

    $data = [
        'jenis' => $this->request->getPost('jenis'),
        'nama' => $this->request->getPost('nama'),
        'deskripsi' => $this->request->getPost('deskripsi'),
    ];

    $model = new model_dokumenauditor();
    $model->update($id, $data);

    return redirect()->to(base_url('auditee/dokumen'));
}


    public function delete_dokumen($id_dokumen)
    {
        $model = new model_dokumenauditor();
        $model->deleteDokumen($id_dokumen);

        return redirect()->to(base_url('auditee/dokumen'));
    }


}

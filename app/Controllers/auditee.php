<?php

namespace App\Controllers;

use App\Models\Model_alatauditor;
use App\Models\model_alokasi;
use App\Models\model_asetauditor;
use App\Models\model_auditee;
use App\Models\model_dokumenauditor;
use App\Models\model_hasilpenilaian;
use App\Models\model_jadwalauditor;
use CodeIgniter\Session\Session;

class auditee extends BaseController
{
    public function view_auditee()
    {
        $model = new model_hasilpenilaian();

        $id = session()->get('id_auditee');
        $model = new model_auditee();
        $dokumen = new model_dokumenauditor();
        $pending = new model_hasilpenilaian();
        $id = session()->get('auditee_id'); // Ambil dari session
        $data = [
            'auditee' => $model->getProfile($id), // Ambil data auditee
            'total_dokumen' => $dokumen->countAllDokumen(),
            // 'jumlah_belum_dinilai' => $pending->hitungJumlahBelumDinilai(),
        ];

        echo view('auditee/layout/header');
        echo view('auditee/layout/main_content', $data);
        echo view('auditee/layout/footer');
    }


    public function view_jadwal()
    {
        $id = session()->get('id_auditee');
        $mb = new model_jadwalauditor();
        $data['dataMb'] = $mb->tampilJadwal_byid($id);

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
            return redirect()->to(base_url('login'))->with('error', 'Anda belum login.');
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
        $file = $this->request->getFile('file');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getClientName();
            $file->move('uploads/dokumen', $newName); // folder tujuan upload

            $model = new model_dokumenauditor();
            $model->save([
                'id_auditee' => session()->get('id_auditee'),
                'kode_dokumen' => $this->request->getPost('kode_dokumen'),
                'jenis' => $this->request->getPost('jenis'),
                'nama' => $this->request->getPost('nama'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'file' => $newName // Simpan nama file saja
            ]);
        }

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

        $file = $this->request->getFile('file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/dokumen', $newName);
            $data['file'] = $newName; // tambahkan field file baru
        }

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

    public function form_aset()
    {
        $id = session()->get('id_auditee'); // ambil dari session login
        $model = new model_asetauditor();

        $data['data'] = $model->tampilaset_byeid($id); // ✅ sesuai login

        echo view('auditee/layout/header');
        echo view('auditee/aset/view_aset', $data);
        echo view('auditee/layout/footer');
    }

    public function save_aset()
    {
        $model = new model_asetauditor();
        $model->save([
            'id_auditee' => session()->get('id_auditee'),
            'kode_aset' => $this->request->getPost('kode_aset'),
            'nama_aset' => $this->request->getPost('nama_aset'),
            'jenis' => $this->request->getPost('jenis'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori')
        ]);

        return redirect()->to(base_url('auditee/aset'));
    }

    public function edit_aset($id_aset)
    {
        $model = new model_asetauditor();
        $data['aset'] = $model->getAsetById($id_aset);

        echo view('auditor/layout/header');
        echo view('auditor/aset/view_aset', $data); // sesuaikan view utama aset
        echo view('auditor/layout/footer');
    }

    public function update_aset()
    {
        $id = $this->request->getPost('id_aset');

        $data = [
            'kode_aset' => $this->request->getPost('kode_aset'),
            'nama_aset' => $this->request->getPost('nama_aset'),
            'jenis' => $this->request->getPost('jenis'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
        ];

        $model = new model_asetauditor();
        $model->updateaset($id, $data);

        return redirect()->to(base_url('auditee/aset'));
    }

    public function delete_aset($id_aset)
    {
        $model = new model_asetauditor();
        $model->delete($id_aset);

        return redirect()->to(base_url('auditee/aset'));
    }

    public function form_alat()
    {
        $id = session()->get('id_auditee'); // ambil dari session login
        $model = new Model_alatauditor();

        $data['data'] = $model->tampilalat_byid($id); // ✅ sesuai login

        echo view('auditee/layout/header');
        echo view('auditee/alat/view_alat', $data);
        echo view('auditee/layout/footer');
    }

    public function save_alat()
    {
        $model = new Model_alatauditor();
        $model->save([
            'id_auditee' => session()->get('id_auditee'),
            'kode_alat' => $this->request->getPost('kode_alat'),
            'nama_alat' => $this->request->getPost('nama_alat'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'disiapkan_oleh' => $this->request->getPost('disiapkan_oleh'),
            'fungsi' => $this->request->getPost('fungsi')
        ]);

        return redirect()->to(base_url('auditee/alat'));
    }

    public function edit_alat($id_alat)
    {
        $model = new Model_alatauditor();
        $data['alat'] = $model->getAlatById($id_alat);

        echo view('auditor/layout/header');
        echo view('auditor/alat/view_alat', $data); // sesuaikan view utama aset
        echo view('auditor/layout/footer');
    }

    public function update_alat()
    {
        $id = $this->request->getPost('id_alat');

        $data = [
            'kode_alat' => $this->request->getPost('kode_alat'),
            'nama_alat' => $this->request->getPost('nama_alat'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'disiapkan_oleh' => $this->request->getPost('disiapkan_oleh'),
            'fungsi' => $this->request->getPost('fungsi')
        ];

        $model = new Model_alatauditor();
        $model->updatealat($id, $data);

        return redirect()->to(base_url('auditee/alat'));
    }

    public function delete_alat($id_alat)
    {
        $model = new Model_alatauditor();
        $model->delete($id_alat);

        return redirect()->to(base_url('auditee/alat'));
    }

    public function view_hasilpenilaian()
    {
        
        // Load model jika belum ada di controller
        $model = new model_hasilpenilaian();

        // Ambil data hasil penilaian dari model
        $data['hasil_penilaian'] = $model->getHasilPenilaian();

        // Tampilkan hasil penilaian di view
        echo view('auditee/layout/header');
        echo view('auditee/hasil_penilaian/view_hasilpenilaian', $data);
        echo view('auditee/layout/footer');
    }

}

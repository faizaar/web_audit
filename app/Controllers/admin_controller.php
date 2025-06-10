<?php
namespace App\Controllers;

use App\Models\model_auditee;
use App\Models\model_auditor;
use App\Models\model_users;
use CodeIgniter\Controller;

class Admin_controller extends BaseController
{
    protected $auditorModel;
    protected $auditeeModel;
    protected $userModel;

    public function __construct()
    {
        $this->auditorModel = new model_auditor();
        $this->auditeeModel = new model_auditee();
        $this->userModel = new model_users();
    }

    // Tampilkan semua data auditor (dengan modal)
    public function index_auditor()
    {
        $keyword = $this->request->getGet('keyword'); // ambil dari input search
        $builder = $this->auditorModel;

        if ($keyword) {
            $builder = $builder->like('nama', $keyword)
                ->orLike('kode_auditor', $keyword)
                ->orLike('bidang_keahlian', $keyword)
                ->orLike('peran', $keyword);
        }

        $data['judul'] = 'Data Akun Auditor';
        $data['auditor'] = $builder->paginate(5, 'auditor');
        $data['pager'] = $this->auditorModel->pager;
        $data['allUsers'] = $this->userModel->findAll();
        $data['keyword'] = $keyword;

        // Ambil semua ID user yang sudah digunakan di tabel auditor
        $usedUserIds = array_column($this->auditorModel->select('id_user')->findAll(), 'id_user');

        // Ambil hanya user yang belum digunakan
        $data['users'] = $this->userModel
            ->whereNotIn('id_user', $usedUserIds)
            ->findAll();

        echo view('superadmin/layout/header');
        echo view('superadmin/layout/nav');
        echo view('superadmin/auditor/view_auditor', $data); // view ini mengandung modal tambah & edit
        echo view('superadmin/layout/footer');
    }

    // Simpan data auditor baru dari modal
    public function save_auditor()
    {
        $data = [
            'kode_auditor' => $this->request->getPost('kode_auditor'),
            'nama' => $this->request->getPost('nama'),
            'bidang_keahlian' => $this->request->getPost('bidang_keahlian'),
            'peran' => $this->request->getPost('peran'),
            'id_user' => $this->request->getPost('id_user')
        ];

        $this->auditorModel->insert($data);
        return redirect()->to('/superadmin/auditor')->with('success', 'Data auditor berhasil ditambahkan.');
    }

    // Update data auditor dari modal
    public function update_auditor($id)
    {
        $data = [
            'kode_auditor' => $this->request->getPost('kode_auditor'),
            'nama' => $this->request->getPost('nama'),
            'bidang_keahlian' => $this->request->getPost('bidang_keahlian'),
            'peran' => $this->request->getPost('peran'),
            'id_user' => $this->request->getPost('id_user')
        ];

        $this->auditorModel->update($id, $data);
        return redirect()->to('/superadmin/auditor')->with('success', 'Data auditor berhasil diupdate.');
    }

    // Hapus auditor
    public function delete_auditor($id)
    {
        $this->auditorModel->delete($id);
        return redirect()->to('/superadmin/auditor')->with('success', 'Data auditor berhasil dihapus.');
    }

    public function index_auditee()
    {
        $keyword = $this->request->getGet('keyword');
        $builder = $this->auditeeModel;

        if ($keyword) {
            $builder = $builder->like('NIP', $keyword)
                ->orLike('jabatan', $keyword)
                ->orLike('auditee', $keyword)
                ->orLike('kategori', $keyword)
                ->orLike('keterangan', $keyword);
        }

        $data['judul'] = 'Data Akun Auditee';
        $data['auditees'] = $builder->paginate(5, 'auditee');
        $data['pager'] = $this->auditeeModel->pager;
        $data['allUsers'] = $this->userModel->findAll();
        $data['keyword'] = $keyword;

        // Ambil user_id yang TIDAK NULL dari auditor & auditee
        $auditorUsedIds = array_column(
            $this->auditorModel->where('id_user IS NOT NULL')->select('id_user')->findAll(),
            'id_user'
        );
        $auditeeUsedIds = array_column(
            $this->auditeeModel->where('user_id IS NOT NULL')->select('user_id')->findAll(),
            'user_id'
        );

        // Gabungkan keduanya
        $usedUserIds = array_unique(array_merge($auditorUsedIds, $auditeeUsedIds));

        // Ambil user yang belum digunakan di kedua tabel
        $data['users'] = $this->userModel
            ->whereNotIn('id_user', $usedUserIds)
            ->findAll();

        echo view('superadmin/layout/header');
        echo view('superadmin/layout/nav');
        echo view('superadmin/auditee/view_auditee', $data);
        echo view('superadmin/layout/footer');
    }


    public function save_auditee()
    {
        $data = [
            'NIP' => $this->request->getPost('NIP'),
            'jabatan' => $this->request->getPost('jabatan'),
            'auditee' => $this->request->getPost('auditee'),
            'kategori' => $this->request->getPost('kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
            'user_id' => $this->request->getPost('user_id')
        ];
        $this->auditeeModel->insert($data);
        return redirect()->to(base_url('superadmin/auditee'))->with('success', 'Data berhasil ditambahkan');
    }


    public function update_auditee($id)
    {
        $data = [
            'NIP' => $this->request->getPost('NIP'),
            'jabatan' => $this->request->getPost('jabatan'),
            'auditee' => $this->request->getPost('auditee'),
            'kategori' => $this->request->getPost('kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
            'user_id' => $this->request->getPost('user_id')
        ];
        $this->auditeeModel->update($id, $data);
        return redirect()->to('/superadmin/auditee')->with('success', 'Data Auditee berhasil diperbarui.');
    }

    public function delete_auditee($id)
    {
        $this->auditeeModel->delete($id);
        return redirect()->to('/superadmin/auditee')->with('success', 'Data Auditee berhasil dihapus.');
    }
}

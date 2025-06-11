<?php
namespace App\Controllers;

use App\Models\model_users;
use App\Models\UserModel;
use App\Models\Model_auditor;
use App\Models\Model_auditee;

class Login extends BaseController
{
    public function form_login()
    {
        return view('auditee/login/form_login');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new model_users();
        $user = $userModel->where('username', $username)->first();

        if ($user && $password === $user['password']) {
            session()->set([
                'id_user' => $user['id_user'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => true
            ]);

            // Cek berdasarkan role
            if ($user['role'] == 'admin') {
                return redirect()->to(base_url('superadmin'));

            } elseif ($user['role'] == 'auditor') {
                $auditorModel = new model_auditor();
                $profil = $auditorModel->where('id_user', $user['id_user'])->first();

                if ($profil) {
                    session()->set([
                        'id_user' => $user['id_user'],
                        'nama' => $profil['nama'],
                        'logged_in' => true
                    ]);
                    return redirect()->to(base_url('auditor'));
                } else {
                    return redirect()->back()->with('error', 'Data auditor tidak ditemukan!');
                }

            } elseif ($user['role'] == 'auditee') {
                $auditeeModel = new model_auditee();
                $profil = $auditeeModel->where('user_id', $user['id_user'])->first();

                if ($profil) {
                    session()->set([
                        'user_id' => $profil['user_id'],
                        'auditee' => $profil['auditee'],
                        'logged_in' => true
                    ]);
                    return redirect()->to(base_url('auditee/dashboard'));
                } else {
                    return redirect()->back()->with('error', 'Data auditee tidak ditemukan!');
                }

            } else {
                return redirect()->back()->with('error', 'Role tidak dikenali!');
            }
        } else {
            return redirect()->back()->with('error', 'Username atau password salah!');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'))->with('message', 'Berhasil logout.');
    }
}

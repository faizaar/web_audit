<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function auditee()
    {
        echo view('auditee/layout/header');
        echo view('auditee/layout/main_content');
        echo view('auditee/layout/footer');
    }

    public function auditor()
    {
        echo view('auditor/layout/header');
        echo view('auditor/layout/main_content');
        echo view('auditor/layout/footer');
    }
    public function superadmin()
    {
        echo view('superadmin/layout/header');
        echo view('superadmin/layout/nav');
        echo view('superadmin/dashboard/dashboard');
        echo view('superadmin/layout/footer');

    }
}

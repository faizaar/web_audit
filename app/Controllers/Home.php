<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function auditee()
    {
        echo view('layout_auditee/header');
        echo view('layout_auditee/main_content');
        echo view('layout_auditee/footer');
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

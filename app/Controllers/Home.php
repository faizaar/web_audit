<?php

namespace App\Controllers;

use App\Models\model_auditee;
use App\Models\model_auditor;
use App\Models\ModelAuditor;

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
        $modelAuditor = new model_auditor();
        $modelAuditee = new model_auditee();

        $data = [
            'total_auditor' => $modelAuditor->getTotalAuditor(),
            'total_auditee' => $modelAuditee->getTotalAuditee(),
        ];
        echo view('superadmin/layout/header');
        echo view('superadmin/layout/nav');
        echo view('superadmin/dashboard/dashboard', $data);
        echo view('superadmin/layout/footer');

    }
}

<?php

namespace App\Controllers;

class auditee extends BaseController
{ 
   public function view_auditee()
    {
        echo view('superadmin/layout/header');
        echo view('superadmin/layout/nav');
        echo view('superadmin/auditee/auditee');
        echo view('superadmin/layout/footer');
    }
}

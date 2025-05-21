<?php

namespace App\Controllers;

class auditor extends BaseController
{ 
   public function view_auditor()
    {
        echo view('auditor/layout/auditor_header');
        echo view('auditor/layout/auditor_nav');
        echo view('auditor/dashboard');
        echo view('auditor/layout/auditor_footer');
    }
}

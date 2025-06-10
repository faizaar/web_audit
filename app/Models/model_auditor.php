<?php
namespace App\Models;

use CodeIgniter\Model;

class model_auditor extends Model
{
    protected $table = 'akun_auditor';
    protected $primaryKey = 'id_auditor';
    protected $allowedFields = ['kode_auditor', 'nama', 'bidang_keahlian', 'peran', 'id_user'];
    protected $returnType = 'array';

    public function getTotalAuditor()
    {
        return $this->countAllResults();
    }
}

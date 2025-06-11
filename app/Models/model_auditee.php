<?php
namespace App\Models;
use CodeIgniter\Model;

class model_auditee extends Model
{
    protected $table = 'akun_auditee';
    protected $primaryKey = 'id_auditee';
    protected $allowedFields = ['NIP', 'jabatan', 'auditee', 'kategori', 'keterangan', 'user_id'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function tampilaauditee()
    {
        $query = $this->db->query("SELECT * FROM alat");
        return $query->getResult();
    }

    public function cek_login($nip)
    {
        return $this->where('NIP', $nip)->first();
    }

    public function getProfile($id)
    {
        return $this->where('id_auditee', $id)->first();
    }

    public function getTotalAuditee()
    {
        return $this->countAllResults();
    }
}

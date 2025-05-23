<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_auditee extends Model
{
    protected $table = 'akun_auditee';
    protected $primaryKey = 'id_auditee';
    protected $allowedFields = ['NIP', 'Jabatan', 'auditee', 'kategori', 'kegiatan'];

    protected $useTimestamps = false;

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }

    public function tampilaauditee()
    {
        $query = $this->db->query("SELECT * FROM alat");
        return $query->getResult();
    }

    public function cek_login($nip)
    {
        return $this->where('NIP', $nip)->first();
    }
}

<?php 
namespace App\Models;
use CodeIgniter\Model;

class Model_alatauditor extends Model
{
    protected $table = 'alat';
    protected $primaryKey = 'id_alat';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSodtDeletes = false;
    protected $allowedFields = [
        'kode_alat',
        'nama_alat',
        'spesifikasi',
        'disiapkan_oleh',
        'fungsi',
        'id_auditee'
    ];
    protected $useTimestamps = false;


    function tampilalat()
    {
        $dataquery=$this->db->query("select * from alat");
        return $dataquery->getResult();
    }

    public function getAlatById($id)
    {
        return $this->where('id_alat', $id)->first();
    }

    public function tampilalat_byid($id_auditee)
    {
        $query = $this->db->query("SELECT * FROM alat where id_auditee = ?", [$id_auditee]);
        return $query->getResultArray();
    }

    public function updatealat($id_alat, $data)
    {
        return $this->update($id_alat, $data);
    }

    public function deletealat($id_alat)
    {
        return $this->delete($id_alat);
    }

}


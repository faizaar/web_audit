<?php
namespace App\Models;
use CodeIgniter\Model;

class model_dokumenauditor extends Model
{
    protected $table = 'dokumen';
    protected $primaryKey = 'id_dokumen';
    protected $allowedFields = ['kode_dokumen','jenis', 'nama', 'deskripsi', 'id_auditee'];
    protected $returnType = 'array';

    function __construct()
    {
        $this->db = db_connect();
    }

    function tampildokumen()
    {
        $dataquery = $this->db->query("select * from dokumen");
        return $dataquery->getResult();
    }

    public function tampildokumen_byeid($id_auditee)
    {
        $query = $this->db->query("SELECT * FROM dokumen WHERE id_auditee = ?", [$id_auditee]);
        return $query->getResultArray(); // ✅ harus array
    }

    public function getDokumenById($id_dokumen)
    {
        return $this->where('id_dokumen', $id_dokumen)->first();
    }

    public function updateDokumen($id_dokumen, $data)
    {
        return $this->update($id_dokumen, $data);
    }

    public function deleteDokumen($id_dokumen)
    {
        return $this->delete($id_dokumen);
    }


}


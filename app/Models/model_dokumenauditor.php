<?php
namespace App\Models;
use CodeIgniter\Model;

class model_dokumenauditor extends Model
{
    protected $table = 'dokumen';
    protected $primaryKey = 'id_dokumen';
    protected $allowedFields = ['kode_dokumen', 'jenis', 'nama', 'deskripsi', 'file', 'id_auditee'];
    protected $returnType = 'array';

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

    // public function countByStatus($status)
    // {
    //     return $this->where('id_auditee', session()->get('id_auditee'))
    //         ->where('status', $status)
    //         ->countAllResults();
    // }

    public function countAllDokumen()
    {
        return $this->where('id_auditee', session()->get('id_auditee'))
            ->countAllResults();
    }

}


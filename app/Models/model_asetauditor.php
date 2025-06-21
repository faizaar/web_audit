<?php
namespace App\Models;
use CodeIgniter\Model;

class model_asetauditor extends Model
{
    protected $table = 'aset';
    protected $primaryKey = 'id_aset';           // primary key

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'kode_aset',
        'nama_aset',
        'jenis',
        'deskripsi',
        'kategori',
        'id_auditee'
    ];

    // Optional: timestamps
    protected $useTimestamps = false;

    function tampilaset()
    {
        $dataquery = $this->db->query("select * from aset");
        return $dataquery->getResult();
    }

    public function getAsetById($id)
    {
        return $this->where('id_aset', $id)->first();

    }

    public function tampilaset_byeid($id_auditee)
    {
        $query = $this->db->query("SELECT * FROM aset WHERE id_auditee = ?", [$id_auditee]);
        return $query->getResultArray(); // ✅ harus array
    }

    public function getAsetDenganRisiko($id_auditee)
    {
        return $this->db->table('aset')
            ->select('aset.*, risiko.penyebab, risiko.dampak, risiko.nilai_frekuensi, risiko.nilai_risiko, risiko.total_frekuensi_risiko')
            ->join('risiko', 'risiko.kode_aset = aset.kode_aset', 'left')
            ->where('aset.id_auditee', $id_auditee)
            ->get()
            ->getResultArray();
    }

    public function updateaset($id_aset, $data)
    {
        return $this->update($id_aset, $data);
    }

    public function deleteaset($id_aset)
    {
        return $this->delete($id_aset);
    }

    public function getAset()
    {
        return $this->findAll();
    }
}


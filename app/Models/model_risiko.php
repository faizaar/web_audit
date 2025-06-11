<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_risiko extends Model
{
    protected $table = 'risiko';
    protected $returnType = 'array';
    protected $primaryKey = 'kode_risiko';
    protected $allowedFields = [
        'kode_risiko', 
        'kode_aset', 
        'penyebab', 
        'dampak', 
        'nilai_frekuensi', 
        'nilai_risiko', 
        'total_frekuensi_risiko', 
        'mitigasi_penyebab', 
        'mitigasi_dampak'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }

    // Ambil semua data
    public function tampilRisiko()
    {
        return $this->findAll();
    }

    // Simpan data baru
    public function insertData($data)
    {
        return $this->insert($data);
    }

    // Ambil data berdasarkan kode_risiko
    public function getRisikoById($kode_risiko)
    {
        return $this->where('kode_risiko', $kode_risiko)->first();
    }

    // Update data risiko
    public function updateData($kode_risiko, $data)
    {
        return $this->update($kode_risiko, $data);
    }

    // Hapus data risiko
    public function deleteData($kode_risiko)
    {
        return $this->delete($kode_risiko);
    }
}

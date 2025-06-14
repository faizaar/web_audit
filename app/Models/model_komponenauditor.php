<?php
namespace App\Models;
use CodeIgniter\Model;

class model_komponenauditor extends Model
{
    protected $table      = 'komponen_penilaian';
    protected $primaryKey = 'id_kontrol';
    protected $allowedFields = [
        'id_kontrol', 'domain', 'tahapan', 'aktivitas',
        'indikator', 'level_1', 'level_2', 'level_3'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }

    public function tampilkomponen()
    {
        return $this->findAll();
    }

    // Ambil satu data berdasarkan ID (bisa digunakan untuk edit)
    public function getKomponenById($id)
    {
        return $this->where('id_kontrol', $id)->first();
    }

    // Simpan data baru
    public function insertKomponen($data)
    {
        return $this->insert($data);
    }

    // Update data
    public function updateKomponen($id, $data)
    {
        return $this->update($id, $data);
    }

    // Hapus data
    public function deleteKomponen($id)
    {
        return $this->delete($id);
    }
}



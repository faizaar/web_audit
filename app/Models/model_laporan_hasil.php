<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_laporan_hasil extends Model
{
    protected $table = 'laporan_hasil_audit';
    protected $returnType = 'array';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_audit', 
        'nama_kegiatan_audit',
        'temuan', 
        'rekomendasi', 
        'rencana', 
        'target_realisasi', 
        'rencana_pelaksana', 
        'tanggal', 
        'nama_jabatan'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }

    // Ambil semua data laporan hasil audit
    public function tampilLaporan()
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }

    // Simpan data baru
    public function insertData($data)
    {
        return $this->insert($data);
    }

    // Ambil data berdasarkan ID
    public function getLaporanById($id)
    {
        return $this->where('id', $id)->first();
    }

    // Update data laporan
    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }

    // Hapus data laporan
    public function deleteData($id)
    {
        return $this->delete($id);
    }
}

<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_auditauditor extends Model
{
    protected $table      = 'audit';
    protected $primaryKey = 'kode_audit'; // sesuaikan jika bukan
    protected $returnType = 'array';
    protected $allowedFields = ['kode_audit', 'nama_kegiatan_audit']; // sesuaikan dengan kolom tabel audit

    public function __construct()
    {
        parent::__construct(); // penting!
    }

    // Ambil semua data audit
    public function tampilaudit()
    {
        return $this->findAll(); // sudah otomatis sesuai returnType (array)
    }
}



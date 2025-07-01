<?php
namespace App\Models;
use CodeIgniter\Model;

class model_temuan extends Model
{
    protected $table = 'temuan';
    protected $primaryKey = 'id_temuan';
    protected $allowedFields = ['id_temuan', 'kode_audit', 'temuan', 'rekomendasi',];
    protected $returnType = 'array';

    public function getAllTemuan()
    {
        return $this->findAll();
    }

    // Simpan temuan baru
    public function simpanTemuan($data)
    {
        return $this->insert($data);
    }

    // Ambil temuan berdasarkan ID
    public function getTemuanById($id_temuan)
    {
        return $this->find($id_temuan);
    }

    public function getHasilTemuan()
    {
        return $this->db->table('temuan') // nama view yang benar
            ->select('kode_audit, temuan, rekomendasi') // pastikan ketiganya ada
            ->get()
            ->getResultArray();
    }


    // Perbarui temuan
    public function updateTemuan($id_temuan, $data)
    {
        return $this->update($id_temuan, $data);
    }

    // Hapus temuan
    public function hapusTemuan($id_temuan)
    {
        return $this->delete($id_temuan);
    }
}


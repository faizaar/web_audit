<?php
namespace App\Models;

use CodeIgniter\Model;

class model_hasilpenilaian extends Model
{
    protected $table = 'hasil_penilaian_view';  // Panggil nama view sebagai tabel
    // protected $primaryKey = 'kode_aset';        // Tentukan primary key jika diperlukan

    public function getHasilPenilaian()
    {
        return $this->findAll(); // Memanggil seluruh data dari view
    }

    public function hitungJumlahBelumDinilai()
    {
        $builder = $this->db->table($this->table);
        // Perbaiki dengan menggunakan '=' bukan '=='
        $builder->where('level_terpenuhi IS NULL OR level_terpenuhi = "Belum Dinilai"');
        return $builder->countAllResults(); // Menghitung jumlah baris
    }
}

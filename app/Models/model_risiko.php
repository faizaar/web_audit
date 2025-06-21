<?php
namespace App\Models;
use CodeIgniter\Model;

class model_risiko extends Model
{
    protected $table = 'risiko';
    protected $returnType = 'array';
    protected $primaryKey = 'id_risiko';
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
        // Pastikan bahwa kode_risiko dicari sebagai string
        return $this->where('kode_risiko', $kode_risiko)->first();
    }

    public function tampilrisiko_byeaset($kode_aset)
    {
        $query = $this->db->query("SELECT * FROM risiko WHERE kode_aset = ?", [$kode_aset]);
        return $query->getResultArray(); // ✅ harus array
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

    public function getByKodeAset($kode_aset)
    {
        return $this->where('kode_aset', $kode_aset)->first();
    }

    public function updateByKodeAset($kode_aset, $data)
    {
        return $this->where('kode_aset', $kode_aset)->set($data)->update();
    }

    public function deleteByKodeAset($kode_aset)
    {
        return $this->where('kode_aset', $kode_aset)->delete();
    }

    public function getFrekuensiPerAset()
    {
        return $this->db->table('risiko r')
            ->select('a.nama_aset, SUM(r.nilai_frekuensi) AS total_frekuensi')
            ->join('aset a', 'a.kode_aset = r.kode_aset')
            ->groupBy('a.nama_aset')
            ->get()->getResultArray();
    }


}

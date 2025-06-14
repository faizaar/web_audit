<?php 
namespace App\Models;
use CodeIgniter\Model;

class Model_alokasi extends Model
{
    protected $table = 'alokasi';
    protected $primaryKey = 'kode_alokasi';
    protected $returnType = 'array';
    protected $allowedFields = [
        'kode_alokasi',
        'id_aset',
        'kode_risiko',
        'kode_kontrol',
        'id_dokumen',
        'teknik_pengujian',
        'id_jadwal',
        'id_auditor',
        'kode_alat',
        'penilaian_level',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }

    // Ambil semua data alokasi dengan join ke nama-nama relasi
    public function tampilAlokasi()
    {
        return $this->select('
                alokasi.*, 
                aset.nama_aset, 
                risiko.penyebab, 
                komponen_penilaian.indikator , 
                dokumen.jenis, 
                jadwal.nama_kegiatan, 
                akun_auditor.nama AS nama_auditor, 
                alat.nama_alat
            ')
            ->join('aset', 'aset.id_aset = alokasi.id_aset', 'left')
            ->join('risiko', 'risiko.kode_risiko = alokasi.kode_risiko', 'left')
            ->join('komponen_penilaian', 'komponen_penilaian.id_kontrol = alokasi.kode_kontrol', 'left')
            ->join('dokumen', 'dokumen.id_dokumen = alokasi.id_dokumen', 'left')
            ->join('jadwal', 'jadwal.id_kegiatan = alokasi.id_jadwal', 'left')
            ->join('akun_auditor', 'akun_auditor.id_auditor = alokasi.id_auditor', 'left')
            ->join('alat', 'alat.id_alat = alokasi.kode_alat', 'left')
            ->findAll();
    }

    // Simpan data baru
    public function insertData($data)
    {
        return $this->insert($data);
    }

    // Ambil data berdasarkan kode_alokasi
    public function getAlokasiById($kode_alokasi)
    {
        return $this->where('kode_alokasi', $kode_alokasi)->first();
    }

    // Update data
    public function updateData($kode_alokasi, $data)
    {
        return $this->update($kode_alokasi, $data);
    }

    // Hapus data
    public function deleteData($kode_alokasi)
    {
        return $this->delete($kode_alokasi);
    }
}

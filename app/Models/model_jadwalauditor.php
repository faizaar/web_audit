<?php
namespace App\Models;
use CodeIgniter\Model;

class model_jadwalauditor extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_kegiatan';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false; 
    protected $allowedFields = [  
            'id_kegiatan',
            'nama_kegiatan',
            'hari_tanggal',
            'jam',
            'target_luaran',
            'id_auditee'
        ];
    protected $useTimestamps = false;


    function tampiljadwal()
    {
        $dataquery = $this->db->query("select * from jadwal");
        return $dataquery->getResult();
    }

    public function getJadwalById($id)
    {
        return $this->where('id_kegiatan', $id)->first(); // BENAR
    }
    public function tampilJadwal_byid($id_auditee)
    {
        $query = $this->db->query("SELECT * FROM jadwal where id_auditee = ?", [$id_auditee]);
        return $query->getResultArray();
    }
    public function updatejadwal($id_jadwal, $data)
    {
        return $this->update($id_jadwal, $data);
    }
    public function deletejadwal($id_jadwal)
    {
        return $this->delete($id_jadwal);
    }

    public function getJadwalTerdekat($limit = 5)
    {
        return $this->db->table('jadwal')
            ->select('jadwal.*, akun_auditee.auditee')
            ->join('akun_auditee', 'akun_auditee.id_auditee = jadwal.id_auditee')
            ->where('hari_tanggal >=', date('Y-m-d'))
            ->orderBy('hari_tanggal', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }


}


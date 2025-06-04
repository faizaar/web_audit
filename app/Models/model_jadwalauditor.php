<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_jadwalauditor extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $useAutoIncrement = true;
    protected $returType = 'array';
    protected $useSodtDelete = false;
    protected $allowFields =
    [
        'nama_kegiatan',
        'hari_tanggal',
        'jam',
        'target_luaran',
        'id_auditee'
    ];
    protected $useTimestamps = false;
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampiljadwal()
    {
        $dataquery=$this->db->query("select * from jadwal");
        return $dataquery->getResult();
    }

    public function getJadwalById($id)
    {
        return $this->whare('id_jadwal', $id)->first();
    }
    public function tampilJadwal_byid($id_auditee)
    {
        $query = $this->db->query("SELECT * FROM jadwal where id_auditee = ?",[$id_auditee]);
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

}


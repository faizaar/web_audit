<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_laporan_hasil extends Model
{
    protected $table = 'laporan_hasil_audit';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampil_laporan_hasil()
    {
        $dataquery=$this->db->query("select * from laporan_hasil_audit");
        return $dataquery->getResult();
    }

}
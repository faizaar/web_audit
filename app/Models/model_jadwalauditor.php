<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_jadwalauditor extends Model
{
    protected $table = 'jadwal';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampiljadwal()
    {
        $dataquery=$this->db->query("select * from jadwal");
        return $dataquery->getResult();
    }

}


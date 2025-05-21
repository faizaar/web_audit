<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_komponenauditor extends Model
{
    protected $table = 'komponen_penilaian';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilkomponen()
    {
        $dataquery=$this->db->query("select * from komponen_penilaian");
        return $dataquery->getResult();
    }

}


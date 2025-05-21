<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_dokumenauditor extends Model
{
    protected $table = 'dokumen';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampildokumen()
    {
        $dataquery=$this->db->query("select * from dokumen");
        return $dataquery->getResult();
    }

}


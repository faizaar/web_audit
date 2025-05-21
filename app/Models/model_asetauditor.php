<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_asetauditor extends Model
{
    protected $table = 'aset';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilaset()
    {
        $dataquery=$this->db->query("select * from aset");
        return $dataquery->getResult();
    }

}


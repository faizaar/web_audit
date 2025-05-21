<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_auditauditor extends Model
{
    protected $table = 'audit';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilaudit()
    {
        $dataquery=$this->db->query("select * from audit");
        return $dataquery->getResult();
    }

}


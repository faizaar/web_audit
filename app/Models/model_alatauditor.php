<?php 
namespace App\Models;
use CodeIgniter\Model;

class Model_alatauditor extends Model
{
    protected $table = 'alat';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilalat()
    {
        $dataquery=$this->db->query("select * from alat");
        return $dataquery->getResult();
    }

}


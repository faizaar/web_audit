<?php 
namespace App\Models;
use CodeIgniter\Model;

class model_risiko extends Model
{
    protected $table = 'risiko';
 
    function __construct()
    {
        $this->db = db_connect();
    }

    function tampilrisiko()
    {
        $dataquery=$this->db->query("select * from risiko");
        return $dataquery->getResult();
    }

}

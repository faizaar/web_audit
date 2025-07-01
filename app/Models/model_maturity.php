<?php
namespace App\Models;

use CodeIgniter\Model;

class model_maturity extends Model
{
    public function getRataRataPerJenisAudit()
    {
        $db = \Config\Database::connect();
        return $db->query("CALL get_avg_skor_by_jenis_audit()")->getResultArray();
    }
    public function getGapAnalysis()
    {
        $db = \Config\Database::connect();
        return $db->query("CALL get_avg_skor_and_gap()")->getResultArray();
    }
    public function getTabelMaturityLevel()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL get_avg_skor_by_jenis_audit()");
        return $query->getResultArray(); // atau getResult() jika ingin objek
    }
    public function getTabelMaturityLevelGAP()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL get_avg_skor_and_gap()");
        return $query->getResultArray(); // atau getResult() jika ingin objek
    }
    public function getAVGLevelGAP()
    {
        $db = \Config\Database::connect();
        $query = $db->query("CALL avg_gap_level()");
        return $query->getRowArray();
 // ['avg_level' => ..., 'avg_gap' => ...]

    }
}

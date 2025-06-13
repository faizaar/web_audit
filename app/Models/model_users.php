<?php
namespace App\Models;

use CodeIgniter\Model;

class model_users extends Model // ✅ harus persis 'model_users'
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $returnType = 'array';
    protected $allowedFields = ['username', 'password', 'role'];
}

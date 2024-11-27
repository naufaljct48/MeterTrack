<?php

namespace App\Models;

use CodeIgniter\Model;

class ReferensiModel extends Model
{
    protected $table      = 'referensi';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = ['jenis', 'deskripsi', 'status'];

    protected $validationRules = [
        'jenis'      => 'required|integer',
        'deskripsi'  => 'required|min_length[3]',
        'status'     => 'in_list[0,1]',
    ];
}

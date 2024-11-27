<?php

namespace App\Models;

use CodeIgniter\Model;

class PemakaianModel extends Model
{
    protected $table      = 'pemakaian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pelanggan', 'bulan', 'tahun', 'volume', 'created_at'];
    protected $createdField  = 'created_at';
    protected $validationRules    = [
        'id_pelanggan' => 'required|is_not_unique[pelanggan.id_pelanggan]',
        'bulan'         => 'required|numeric|exact_length[2]',
        'tahun'         => 'required|numeric|exact_length[4]',
        'volume'        => 'required|numeric',
    ];
    protected $validationMessages = [
        'id_pelanggan' => [
            'required' => 'ID Pelanggan harus diisi.',
        ],
        'bulan' => [
            'required' => 'Bulan harus diisi.',
            'numeric' => 'Bulan harus berupa angka.',
            'exact_length' => 'Bulan harus terdiri dari 2 digit.',
        ],
        'tahun' => [
            'required' => 'Tahun harus diisi.',
            'numeric' => 'Tahun harus berupa angka.',
            'exact_length' => 'Tahun harus terdiri dari 4 digit.',
        ],
        'volume' => [
            'required' => 'Volume pemakaian harus diisi.',
            'numeric' => 'Volume harus berupa angka.',
        ]
    ];
}

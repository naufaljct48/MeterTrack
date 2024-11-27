<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_pelanggan', 'nama', 'alamat', 'telepon'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'id_pelanggan' => 'required|is_unique[pelanggan.id_pelanggan]',
        'nama'         => 'required|min_length[3]',
        'alamat'       => 'required',
        'telepon'      => 'required|numeric|min_length[10]',
    ];

    protected $validationMessages = [
        'id_pelanggan' => [
            'required' => 'ID Pelanggan harus diisi.',
            'is_unique' => 'ID Pelanggan sudah terdaftar.'
        ],
        'nama' => [
            'required' => 'Nama pelanggan harus diisi.',
            'min_length' => 'Nama pelanggan minimal 3 karakter.'
        ],
        'alamat' => [
            'required' => 'Alamat pelanggan harus diisi.'
        ],
        'telepon' => [
            'required' => 'Nomor telepon harus diisi.',
            'numeric' => 'Nomor telepon hanya boleh berupa angka.',
            'min_length' => 'Nomor telepon minimal 10 digit.'
        ]
    ];
}

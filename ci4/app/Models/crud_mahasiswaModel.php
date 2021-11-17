<?php

namespace App\Models;

use CodeIgniter\Model;

class crud_mahasiswaModel extends Model
{
    protected $table = 'crud_mahasiswa';
    protected $allowedFields = ['nim', 'nama', 'alamat', 'prodi', 'foto'];
}
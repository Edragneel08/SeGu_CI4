<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'staffID';

    protected $allowedFields = [
        'staffID',
        'SID',
        'ICNO',
        'noPhone',
        'img',
        'email',
        'fullname',
        'username',
        'password'
    ];

    protected $useTimestamps = true;
}
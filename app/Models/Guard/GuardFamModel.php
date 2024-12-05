<?php

namespace App\Models\Guard;

use CodeIgniter\Model;

class GuardFamModel extends Model
{
    // Define the table name where guard data is stored
    protected $table = 'guardfamilydetails';  // Update with the actual table name for guards
    protected $primaryKey = 'guardID';  // Assuming 'guardID' is the primary key

    // List all the columns that are allowed to be inserted or updated
    protected $allowedFields = [
        'guardID',
        'maritalStatus',
        'guardSpName',
        'guardFamOccu',
        'guardFamNoP1',
        'guardNumOfChild',
        'guardSpAdd',
        'guardFN',
        'guardFOccu',
        'guardMomName',
        'guardMomOccu',
        'guardParentAdd'
    ];

    // Optionally, if you have created_at and updated_at fields in the table, enable timestamps
    protected $useTimestamps = false;
    protected $createdField = 'created_at'; // If applicable
    protected $updatedField = 'updated_at'; // If applicable
}

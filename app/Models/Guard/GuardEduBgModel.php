<?php

namespace App\Models\Guard;

use CodeIgniter\Model;

class GuardEduBgModel extends Model
{
    // Define the table name where guard education background data is stored
    protected $table = 'guardedubg'; // Updated table name
    protected $primaryKey = 'id'; // Assuming 'id' is the primary key

    // List all the columns that are allowed to be inserted or updated
    protected $allowedFields = [
        'guardID',
        'school',
        'state',
        'dateStart',
        'dateTo'
    ];

    // Optionally, if you have created_at and updated_at fields in the table, enable timestamps
    protected $useTimestamps = false; // Set to true if you have timestamp columns
    protected $createdField = 'created_at'; // If applicable
    protected $updatedField = 'updated_at'; // If applicable
}

<?php

namespace App\Models\Guard;

use CodeIgniter\Model;

class GuardModel extends Model
{
    // Define the table name where guard data is stored
    protected $table = 'guardpersonaldetails';  // Update with the actual table name for guards
    protected $primaryKey = 'id';  // Assuming 'guardID' is the primary key

    // List all the columns that are allowed to be inserted or updated
    protected $allowedFields = [
        'id',
        'guardID',
        'siteID',
        'img',
        'guardSalary',
        'guardName',
        'guardICNO',
        'guardAddress',
        'guardPhoneNo',
        'nationality',
        'guardDOB',
        'guardPOB',
        'guardEPFNo',
        'religion',
        'guardGender',
        'guardSocsoNo',
        'guardRace',
        'guardAccNo',
        'guardNOB',
        'guardStatus',
        'dateWorkStart',
        'dateContractEnd'
    ];

    // Optionally, if you have created_at and updated_at fields in the table, enable timestamps
    protected $useTimestamps = false;
    protected $createdField = 'created_at'; // If applicable
    protected $updatedField = 'updated_at'; // If applicable
}

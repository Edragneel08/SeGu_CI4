<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteModel extends Model
{
    protected $table = 'site';
    protected $primaryKey = 'siteID';

    protected $allowedFields = [
        'siteID',
        'siteName',
        'siteAddress',
        'startDate',
        'endDate',
        'location',
        'status'
    ];

    protected $useTimestamps = false; // Set to true if you have created_at and updated_at columns in your table
}
<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SiteModel;

class SiteController extends Controller
{
    public function listSite()
    {
        // Start the session
        $session = session();

        // Get session data (e.g., username)
        $username = $session->get('username');

        // Fetch all users from the UserModel
        $siteModel = new SiteModel();
        $data['sites'] = $siteModel->findAll();
     
        // Add session username to the data array
        $data['username'] = $username;

        // Redirect to listSite with data
        return view('listSite', $data);
    }

    public function addNewSite()
    {
        // Start the session
        $session = session();

        // Get session data (e.g., username)
        $username = $session->get('username');

        // Pass session data to the view
        return view('addNewSite', ['username' => $username]);
    }
    
}

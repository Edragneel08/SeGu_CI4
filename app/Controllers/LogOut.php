<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class LogOut extends Controller
{
    public function logout()
    {
         // Load the session service
         $session = session();

         // Destroy the session
         $session->destroy();
 
         // Optionally, redirect to the login page or home page after logout
         return redirect()->to('Home'); // Change '/login' to your desired redirect path
    }
}

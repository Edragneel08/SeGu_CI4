<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function validation()
    {
        $session = session();
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Get user data based on the username
        $data = $userModel->where('username', $username)->first();

        // Check if user exists
        if ($data) {
            $storedPassword = $data['password']; // Assuming this is stored in plain text

            // Compare the entered password with the stored password directly
            if ($password === $storedPassword) {
                $ses_data = [
                    'staffID' => $data['staffID'],
                    'username' => $data['username'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('adminController/login');
            } else {
                // If the password does not match
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('');
            }
        } else {
            // If the username does not exist
            $session->setFlashdata('msg', 'Username does not exist.');
            return redirect()->to('');
        }
    }
}
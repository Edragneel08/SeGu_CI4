<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class adminController extends Controller
{
    public function login()
    {
        // Start the session
        $session = session();

        // Get session data (e.g., username)
        $username = $session->get('username');

        // Pass session data to the view
        return view('admin/adminDashboard', ['username' => $username]);
    }

    public function listOfStaff()
    {
        // Start the session
        $session = session();

        // Get session data (e.g., username)
        $username = $session->get('username');

        // Fetch all users from the UserModel
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        // Add session username to the data array
        $data['username'] = $username;

        // Redirect to adminDashboard with data
        return view('admin/listOfStaff', $data);
    }

    public function addNewStaff()
    {
        // Start the session
        $session = session();

        // Get session data (e.g., username)
        $username = $session->get('username');

        // Pass session data to the view
        return view('admin/addNewStaff', ['username' => $username]);

    }

    public function insertStaff()
    {
        $userModel = new UserModel();

        // Prepare form data
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'ICNO' => $this->request->getPost('ICNO'),
            'noPhone' => $this->request->getPost('noPhone'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            // Hash password before storing
            //'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'password' => $this->request->getPost('password'),
        ];

        // Handle image upload if a file was uploaded
        $img = $this->request->getFile('img');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Convert the uploaded image to base64 and store it
            $data['img'] = base64_encode(file_get_contents($img->getTempName()));
        } else {
            $data['img'] = '';  // Default or fallback value if no image is provided
        }

        // Insert the data into the database
        $userModel->insert($data);

        // Get the inserted staffID
        $insertedStaffID = $userModel->insertID();  // Retrieve the last inserted ID

        if ($insertedStaffID) {
            // Generate the SID based on the inserted staffID
            $generatedSID = 'stJPS_' . $insertedStaffID;

            // Update the staff record with the generated SID
            $userModel->update($insertedStaffID, ['SID' => $generatedSID]);
        }

        // Redirect after successful insertion
        return redirect()->to('adminController/admin/listOfStaff')->with('success', 'Staff added successfully.');
    }

    public function updateStaff($staffID = null)
    {
        // Start the session
        $session = session();

        // Check if the user is logged in (session exists)
        if (!$session->has('username')) {
            return redirect()->to('/login')->with('error', 'Session expired. Please log in again.');
        }

        // Fetch the staff details using the staffID
        $userModel = new UserModel();
        $staff = $userModel->find($staffID);

        // Check if staff exists
        if (!$staff) {
            return redirect()->to('admin/listOfStaff')->with('error', 'Staff not found.');
        }

        // Pass the staff data to the view
        $data['staff'] = $staff;
        $data['username'] = $session->get('username');

        return view('admin/addNewStaff', $data);
    }

    public function updateStaffProcess()
    {
        $userModel = new UserModel();
        $staffID = $this->request->getPost('staffID');

        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'ICNO' => $this->request->getPost('ICNO'),
            'noPhone' => $this->request->getPost('noPhone'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
        ];

        // Handle image upload
        $img = $this->request->getFile('img');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imgContent = file_get_contents($img->getTempName());
            $img = base64_encode($imgContent);
            $data['img'] = $img; // Save base64 image data to database
        }

        // Update staff details
        $userModel->update($staffID, $data);

        return redirect()->to('adminController/updateStaff/'.$staffID)->with('success', 'Staff details updated successfully.');
    }

    public function deleteStaff($id = null)
    {
        // Initialize the UserModel
        $userModel = new UserModel();

        // Check if the ID is provided and valid
        if ($id !== null) {
            // Try to delete the record
            if ($userModel->delete($id)) {
                // Redirect with success message
                return redirect()->to('adminController/admin/listOfStaff')->with('success', 'Staff record deleted successfully.');
            } else {
                // Redirect with error message if deletion failed
                return redirect()->to('adminController/admin/listOfStaff')->with('error', 'Failed to delete staff record.');
            }
        } else {
            // Redirect with error message if ID is invalid
            return redirect()->to('adminController/admin/listOfStaff')->with('error', 'Invalid staff ID.');
        }
    }

}

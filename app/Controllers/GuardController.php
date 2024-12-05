<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Guard\GuardModel;
use App\Models\Guard\GuardFamModel;
use App\Models\Guard\GuardEduBgModel;
use App\Models\SiteModel;

class GuardController extends Controller
{
    public function guardList()
    {
        // Start the session
        $session = session();

        // Load guard and site models
        $guardModel = new GuardModel();
        $siteModel = new SiteModel();

        // Fetch guards and sites
        $data['listGuard'] = $guardModel->findAll();
        $data['listSite'] = $siteModel->where('status', 'Active')->findAll();
        $data['username'] = $session->get('username');

        // Create an associative array for quick site lookup
        $siteLookup = [];
        foreach ($data['listSite'] as $site) {
            $siteLookup[$site['siteID']] = [
                'siteName' => $site['siteName'],
                'siteAddress' => $site['siteAddress'],
            ];
        }

        // Get site details for each guard
        foreach ($data['listGuard'] as &$guard) {
            if (isset($siteLookup[$guard['siteID']])) {
                $guard['siteName'] = $siteLookup[$guard['siteID']]['siteName'];
                $guard['siteAddress'] = $siteLookup[$guard['siteID']]['siteAddress'];
            } else {
                $guard['siteName'] = $guard['siteID'] == 0 ? 'Not Assigned' : 'Unknown Site';
                $guard['siteAddress'] = $guard['siteID'] == 0 ? 'N/A' : 'Unknown Address';
            }
        }

        return view('guard/guardList', $data); // Load the guards_list view
    }

    //ADD GUARD
    public function addGuard()
    {
        // Start the session
        $session = session();
        $data['username'] = $session->get('username');

        return view('guard/addGuard', $data);
    }

    //inserting the form
    public function insertGuard()
    {
        // Start the session
        $session = session();
        $data['username'] = $session->get('username');

        $guardModel = new GuardModel();

        // Check if the request is a POST request
        if ($this->request->getMethod() === 'POST') {
            // Retrieve guard data from the form
            $data = [
                'guardSalary' => $this->request->getPost('guardSalary'), // example input
                'guardName' => $this->request->getPost('guardName'),
                'guardICNO' => $this->request->getPost('guardICNO'),
                'guardAddress' => $this->request->getPost('guardAddress'),
                'guardPhoneNo' => $this->request->getPost('guardPhoneNo'),
                'nationality' => $this->request->getPost('nationality'),
                'guardDOB' => $this->request->getPost('guardDOB'),
                'guardPOB' => $this->request->getPost('guardPOB'),
                'guardEPFNo' => $this->request->getPost('guardEPFNo'),
                'religion' => $this->request->getPost('religion'),
                'guardGender' => $this->request->getPost('guardGender'),
                'guardSocsoNo' => $this->request->getPost('guardSocsoNo'),
                'guardRace' => $this->request->getPost('guardRace'),
                'guardAccNo' => $this->request->getPost('guardAccNo'),
                'guardNOB' => $this->request->getPost('guardNOB'),
                'guardStatus' => 'Active',
                'dateWorkStart' => $this->request->getPost('dateWorkStart'),
                'dateContractEnd' => $this->request->getPost('dateContractEnd'),
                // 'siteID' => $this->request->getPost('siteID') // This will be omitted for now
            ];

            // Handle image upload if a file was uploaded
            $img = $this->request->getFile('img');
            if ($img && $img->isValid() && !$img->hasMoved()) {
                // Convert the uploaded image to base64 and store it
                $data['img'] = base64_encode(file_get_contents($img->getTempName()));
            } else {
                $data['img'] = '';  // Default or fallback value if no image is provided
            }

            // Insert the guard record
            $guardModel->insert($data);

            // Assuming you have already performed the insert operation before this
            $insertedID = $guardModel->getInsertID();


            // Format the guardID using the inserted ID
            $guardID = 'JPS' . $insertedID;

            // Update the guard record's guardID with the formatted value
            $guardModel->update($insertedID, ['guardID' => $guardID]);


            //start insert family details
            $guardFamModel = new GuardFamModel();

            $dataFam = [
                'guardID' => $guardID,
                'maritalStatus' => $this->request->getPost('maritalStatus'),
                'guardSpName' => $this->request->getPost('guardSpName') ?? '-',
                'guardFamOccu' => $this->request->getPost('guardFamOccu') ?? '-',
                'guardFamNoP1' => $this->request->getPost('guardFamNoP1') ?? '-',
                'guardNumOfChild' => $this->request->getPost('guardNumOfChild') ?? '-',
                'guardSpAdd' => $this->request->getPost('guardSpAdd') ?? '-',
                'guardFN' => $this->request->getPost('guardFN'),
                'guardFOccu' => $this->request->getPost('guardFOccu'),
                'guardMomName' => $this->request->getPost('guardMomName'),
                'guardMomOccu' => $this->request->getPost('guardMomOccu'),
                'guardParentAdd' => $this->request->getPost('guardParentAdd'),
            ];

            // Insert the family details
            $guardFamModel->insert($dataFam);
            //end insert family details

            //start insert EDU BG
            $guardEduBgModel = new GuardEduBgModel();

            // Get the educational background data from the form
            $schools = $this->request->getPost('school');
            $states = $this->request->getPost('state'); 
            $dateStarts = $this->request->getPost('dateStart');
            $dateTos = $this->request->getPost('dateTo');
            $ids = $this->request->getPost('id'); // Hidden input for existing records

            // Loop through the submitted data and insert or update records
            if ($schools && is_array($schools)) {
                foreach ($schools as $index => $school) {
                    $dataEdu = [
                        'guardID' => $guardID,
                        'school' => $school,
                        'state' => $states[$index] ?? '',
                        'dateStart' => $dateStarts[$index] ?? '',
                        'dateTo' => $dateTos[$index] ?? '',
                    ];

                    // Check if the ID exists (update if it does, insert otherwise)
                    if (!empty($ids[$index])) {
                        $guardEduBgModel->update($ids[$index], $dataEdu);
                    } else {
                        $guardEduBgModel->insert($dataEdu);
                    }
                }
            }
            //end insert EDU BG

            $data['username'] = $session->get('username');
            // Redirect or load the guard list view
            // return $this->guardList(); // This will redirect to the guard list view
            return view('guard/addGuard', $data);
        }

        // Set the username in data (if you need it in the view)
        $data['username'] = $session->get('username');

        // Load the form if not POST
        return view('guard/addGuard', $data);
    }



    public function deleteGuard($id = null)
    {
        // Initialize the UserModel
        $guardModel = new GuardModel();

        // Check if the ID is provided and valid
        if ($id !== null) {
            // Try to delete the record
            if ($guardModel->delete($id)) {
                // Redirect with success message
                return $this->guardList();
            } else {
                // Redirect with error message if deletion failed
                return $this->guardList();
            }
        } else {
            // Redirect with error message if ID is invalid
            return $this->guardList();
        }
    }
}
<?php

namespace App\Controllers;
use App\Libraries\Controller;

class Client extends Controller
{

    //endpoint for displaying client's list
    public function index()
    {
        //Instantiating model
        $clients = $this->model('client');

        //Fetching all clients data from DB
        $allClients = $clients->fetchAllClient();

        //Preparing data to send to view
        $data = 
        [
            'allClients' => $allClients,
            'allClientkeys' => array_keys($allClients[0])
        ];

        //Loading view with data
        return $this->view("pages/index", $data);
    }

    //Loading form to create a new client
    public function create()
    {
        $data = 
        [
            'firstName' => '',
            'lastName' => '',
            'phoneNumber' => '',
            'dateContacted' => '',
        ];
        return $this->view('pages/create', $data);
    }

    public function store()
    {
        //Making sure submit button pressed
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {

            $data = 
                [
                    ':firstName' => htmlspecialchars(strip_tags($_POST['firstName'])),
                    ':lastName' => htmlspecialchars(strip_tags($_POST['lastName'])),
                    ':phoneNumber' => htmlspecialchars(strip_tags($_POST['phoneNumber'])),
                    ':dateContacted' => htmlspecialchars(strip_tags($_POST['dateContacted']))
                ];

        //Instantiating model
        $clients = $this->model('client');

        //Fetching all clients data from DB
        $clientCreated = $clients->createNewClient($data);

        if($clientCreated)
        {
            header('Location:' . URL_ROOT);
        }
        else 
        {
            die('not created');
        }

        }
    }

    public function delete($id)
    {
        //Instantiating model
        $clients = $this->model('client');

        $data =
            [
                ':id' => $id
            ];
        //Fetching all clients data from DB
        $clientDeleted = $clients->deleteClient($data);

        if($clientDeleted)
        {
            header('Location:' . URL_ROOT);
        }

        else
        {
            die('cannot delete');
        }
    }


    public function edit($id)
    {
        $clientModel = $this->model("client");
        $client = $clientModel->fetchSingleClient([':id' => $id]);
        
        $data = [
            'client' => $client,
        ];

        return $this->view("pages/edit", $data);
    }

    public function update($id)
    {
        $date = $_POST['dateContacted'];
        $date = explode(' ', $date);
        $date = array_shift($date);
 
        $data = 
        [
            ':id' => $id,
            ':firstName' => $_POST['firstName'],
            ':lastName' => $_POST['lastName'],
            ':phoneNumber' => $_POST['phoneNumber'],
            ':dateContacted' => $date//$_POST['dateContacted']
        ];
        // var_dump($data);
        $clientModel = $this->model("client");
        $updated = $clientModel->updateClient($data);

        if($updated)
        {
            header('Location: '. URL_ROOT);
        }
        else
        {

            die('Not updated');
        }

    }

}
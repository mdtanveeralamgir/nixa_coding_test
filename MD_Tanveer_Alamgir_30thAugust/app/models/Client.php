<?php

namespace App\Models;

use App\Libraries\Database;

class Client extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetchAllClient()
    {
        $query = "SELECT * FROM Clients;";

        return $this->fetchData($query);
    }

    public function createNewClient($data)
    {

        $query = "INSERT INTO Clients (FName, LName, PhoneNumber, DateOfContact) VALUES (:firstName, :lastName, :phoneNumber, CAST(:dateContacted AS DATE))";

        return $this->modifyTable($query, $data);
    }

    public function fetchSingleClient($data)
    {
        $query = "SELECT * FROM Clients WHERE id = :id";
        
        return$this->fetchData($query, $data);
    }

    public function updateClient($variables)
    {
        var_dump($variables);

        $query = "UPDATE Clients SET FName = :firstName, LName = :lastName, PhoneNumber = :phoneNumber, DateOfContact = CAST(:dateContacted AS DATE) WHERE id = :id";
        
        return $this->modifyTable($query, $variables);
    }

    public function deleteClient($data)
    {
        $query = "DELETE FROM Clients WHERE id = :id";

        return $this->modifyTable($query, $data);
    }
}
<?php
namespace App\Libraries;
use \PDO;

class Database extends Controller
{
    private $connection = null;
    public function __construct()
    {
        $this->connection = $this->setConnection();
    }

    private function getDns()
    {
        $host = HOST;
        $dbName = DB_NAME;

        return "mysql:host={$host};dbname={$dbName};charset=UTF8";
    }

    private function setConnection ()
    {
        $pdo = null;
        $dns = $this->getDns();

        try
        {
            $pdo = new PDO($dns, "root", "Opel120386!");
        }
        catch(\PDOException $e)
        {
            $error = "Not connected";
            return $this->view('error/404', $error);
        }

        return $pdo;
    }

    public function getConnection()
    {
        return $this->connection;
    }


    public function fetchData($query, $variables = array(), $returnType = PDO::FETCH_ASSOC)
    {
        if($query)
        {
            $connection = $this->getConnection();

            if($connection)
            {
                $statement = $connection->prepare($query);
                $statement->execute($variables);
                return $statement->fetchAll($returnType);
            }
            else
            {
                die("no db");
            }
        }
    }

    public function modifyTable($query, $variables)
    {
        if($query)
        {
            $connection = $this->getConnection();

            if($connection)
            {
                $statement = $connection->prepare($query);
                
                return $statement->execute($variables);
            }
            else
            {
                die("no db");
            }
        }

    }
}
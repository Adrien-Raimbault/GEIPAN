<?php

class Query
{
    private string $serverName = "localhost";
    private string $userName = "root";
    private string $database = "geipan";
    private string $userPassword = "root";
    public object $connexion;

    public function __construct()
    {
        try{
            $this->connexion = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->userName, $this->userPassword);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            die("Erreur :  " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        unset($this->connexion);        
    }
}

<?php

class Query
{
    private string $serverName = "localhost";
    private string $userName = "root";
    private string $database = "geipan";
    private string $userPassword = "root";
    private object $connexion;

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

    public function prepare($sql){
        return $this->connexion->prepare($sql);
    }

    public function select($table, $tableCol = null, $tableColValue = null){
        if($tableCol === null && $tableColValue === null) {
            $sql = "SELECT * FROM $table";
        } else {
            $sql = "SELECT * FROM $table WHERE $tableCol='$tableColValue'";
        }
            $requete = $this->connexion->prepare($sql);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
            return $resultat;
    }

    public function __destruct()
    {
        unset($this->connexion);        
    }
}

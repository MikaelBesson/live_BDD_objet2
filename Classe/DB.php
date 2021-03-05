<?php

class DB
{
    private string $host = 'localhost';
    private string $db = 'live_bdd_objet';
    private string $user = 'root';
    private string $password ='';

    private static ?PDO $dbInstance = null;

    public function __construct(){
        try{
            self::$dbInstance = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->user, $this->password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        }
        catch(PDOException $exception){
            echo $exception->getMessage();
        }
    }
    /**
     * retourne une instance de l'objet PDO
     */
    public static function getInstance(): ?PDO {
        if(null === self::$dbInstance){
            new self();
        }
        return self::$dbInstance;
    }

    /**
     * on empeche de laisser d'autre dev de cloner l'objet
     * pour s'assurer qu'on a bel et bien qu'une instance de la connexion db
     */
    public function __clone(){}
}


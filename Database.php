<?php


class Database{

    protected $pdo;

    public function __construct($config){
        $dsn = "mysql:" . http_build_query($config, "", ";");

        //Se connecter à la bdd
       $this -> pdo = new PDO($dsn);
    }

    public function query($query, $param=[]) {
        //Préparer la requete

        $pdoStatement = $this -> pdo -> prepare($query);

        //Executer une requetes SQL pour recuperer les produits de la table produits
        $pdoStatement -> execute($param);

        //Affecter les produits récupérés dans la variable $produits
        return $pdoStatement ;
    }
    

}
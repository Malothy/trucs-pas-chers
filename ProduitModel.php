<?php
class ProduitModel
{
    protected $db;

    public function __construct(){
        $config = require "config.php";
        $this->db = new Database($config["database"]);

    }
    
    public function all(){
        return $this->db->query("SELECT * FROM produits")->fetchAll();
    }

    public function filterByEtudiantId($etudiant_id){
        return $this->db->query("SELECT * FROM produits WHERE etudiant_id = :etudiant_id", [
            "etudiant_id" => $etudiant_id
        ])->fetchAll();
    }

    public function create($etudiant_id, $nom, $prix, $devise, $image_name) {

        $this->db-> query("INSERT INTO produits(etudiant_id, nom, prix, devise, images)

        VALUES(:etudiant_id, :nom, :prix, :devise, :image)",
        [
                'etudiant_id' => $etudiant_id,
                'nom' => $nom,
                'prix' => $prix,
                'devise' => $devise,
                'image' => $image_name,
            ]
        );
    }
}


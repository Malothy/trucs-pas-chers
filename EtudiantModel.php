<?php

class EtudiantModel
{


    public function all()
    {
        return [
            [
                "id" => 1,
                "nom" => "Malothy",
                "promotion" => "L3 DSG",
                "tel" => "0886988800"
            ],
            [
                "id" => 2,
                "nom" => "Justin",
                "promotion" => "L3 GL",
                "tel" => "0885550000"
            ],
            [
                "id" => 3,
                "nom" => "Nathan",
                "promotion" => "L3 TLC",
                "tel" => "0810033000"
            ],
            [
                "id" => 4,
                "nom" => "Babi",
                "promotion" => "L3 DSG",
                "tel" => "0815501200"
            ],
            [
                "id" => 5,
                "nom" => "Kanda",
                "promotion" => "L3 AS",
                "tel" => "0895580000"
            ]

        ];
    }

    public function find($etudiant_id)
    {
        foreach ($this->all() as $etudiant) {
            if ($etudiant_id == $etudiant["id"]) {
                return $etudiant;
            }
        }
        return null;
    }
}

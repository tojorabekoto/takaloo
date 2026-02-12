<?php

namespace app\models;

class ChaufferModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getChauffer()
    {
        $stmt = $this->db->query("SELECT * FROM chauffeur ORDER BY id");
        return $stmt->fetchAll();
    }
    public function getVehicules()
    {
        $stmt = $this->db->query("SELECT * FROM vehicule ORDER BY id");
        return $stmt->fetchAll();
    }

     public function getSalaires()
    {
        $stmt = $this->db->query("SELECT c.nom AS chauffeur_name, s.date_jour AS jour, s.montant_salaire AS salaire, s.pourcentage_applique AS pourcentage, s.montant_salaire - s.pourcentage_applique AS benef, vm.montant_minimum FROM salaire_chauffeur s JOIN chauffeur c ON c.id = s.id_chauffeur JOIN versement_minimum vm ON vm.id_vehicule = c.id ORDER BY s.date_jour DESC");
        return $stmt->fetchAll();
    }

    public function getVoiturePanne()
    {
        $stmt = $this->db->query("SELECT p.*, v.matricule FROM panne p JOIN vehicule v ON v.id = p.id_vehicule ORDER BY p.date_debut_panne DESC");
        return $stmt->fetchAll();
    }

     public function getSalaireMin()
    {
        $stmt = $this->db->query("SELECT vm.*, v.matricule FROM versement_minimum vm JOIN vehicule v ON v.id = vm.id_vehicule ORDER BY date_versement DESC");
        return $stmt->fetchAll();
    }

    public function getTrajets()
    {
        $stmt = $this->db->query("SELECT t.*, v.matricule, c.nom AS chauffeur_nom FROM trajet t JOIN vehicule v ON v.id = t.id_vehicule JOIN chauffeur c ON c.id = t.id_chauffeur ORDER BY t.date_debut DESC");
        return $stmt->fetchAll();
    }

}

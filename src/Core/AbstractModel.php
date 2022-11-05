<?php 

/**
 * Classe abstraite qui sera parente des classes de modèles
 * Elle permet de mutualiser la propriété $db qui stocke l'objet Database
 */
abstract class AbstractModel {

    protected Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}
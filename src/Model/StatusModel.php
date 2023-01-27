<?php 

// Définition du namespace
namespace App\Model;

//Import des classes
use App\Core\AbstractModel;

class StatusModel extends AbstractModel {

    /**
     * Sélectionne l'ensemble des sujets de la table subjects
     * @return array Le tableau contenant les sujets 
     */
    function getAllStatus(): array
    {
        
        // Préparation du statuts
        $sql = 'SELECT * FROM status';
        $pdoStatement = self::$pdo->prepare($sql);
        
        // Exécution du statut
        $pdoStatement->execute();

        // On retourne tous les résultats 
        $results = $pdoStatement->fetchAll();

        // PHP < 8.0.0 : si on récupère la valeur false de la méthode fetchAll(), on retourne un tableau vide
        if (!$results) {
            return [];
        }

        return $results;
    }

    /**
     * Crée un statut dans la table status
     */
    function createStatus($id_status, $status_label): bool
    {
        // Préparation du statut
        $sql = 'INSERT INTO statuts (id_status, status_label) VALUES (?,?)';
        $pdoStatement = self::$pdo->prepare($sql);
        
        // Exécution du statut
        $sqlStatus = $pdoStatement->execute([$id_status, $status_label]);
        
        return $sqlStatus;

    }

    /**
     * Supprime un statut dans la table status
     */
    function deleteStatus($id_status) {
        $sql = 'DELETE FROM status WHERE id_status = ?';
        $pdoStatement = self::$pdo->prepare($sql);

        $sqlStatus = $pdoStatement->execute([$id_status]);

        return $sqlStatus;
    }
}
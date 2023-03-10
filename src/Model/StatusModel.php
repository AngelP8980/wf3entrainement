<?php 

// Définition du namespace
namespace App\Model;

//Import des classes
use App\Entity\Status;
use App\Core\AbstractModel;

class StatusModel extends AbstractModel {

    /**
     * Sélectionne l'ensemble des statuts de la table status
     * @return array Le tableau contenant les statuts 
     */
    function getAllStatus(): array
    {
        
        // Préparation du statut
        $sql = 'SELECT * FROM status ORDER BY id_status';
        $pdoStatement = self::$pdo->prepare($sql);
        
        // Exécution du statut
        $pdoStatement->execute();

        // On retourne tous les résultats 
        $results = $pdoStatement->fetchAll();

        // PHP < 8.0.0 : si on récupère la valeur false de la méthode fetchAll(), on retourne un tableau vide
        if (!$results) {
            return [];
        }

        // Création d'un tableau pour stocker les objets
        $allStatus = [];

        // On parcourt les résultats, pour chaque statuts (tableau associatif)...
        foreach ($results as $result) {

          
            // Instanciation de l'objet Status
            $status = new Status(
                $result['id_status'],
                $result['status_label'],
            );


            // On ajoute l'objet Status dans le tableau de statuts
            $allStatus[] = $status;
        }

        return $allStatus;
    }

    /**
     * Crée un statut dans la table status
     */
    function createStatus($id_status, $status_label): bool
    {
        // Préparation du statut
        $sql = 'INSERT INTO status (id_status, status_label) VALUES (?,?)';
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

    function getOneStatusById(?int $status_id): Status 
    {
        // Préparation du statut
        $sql = 'SELECT * FROM status WHERE id_status = ?';
        $pdoStatement = self::$pdo->prepare($sql);

        // Exécution du statut
        $pdoStatement->execute([$status_id]);

        // Récupération du résultat 
        $statusData = $pdoStatement->fetch();
        if (!$statusData) {
            return [];
        }
        $status = new Status($statusData['id_status'], $statusData['status_label']);

        return $status;
    }
}
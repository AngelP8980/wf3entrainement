<?php 

// Définition du namespace
namespace App\Model;

//Import des classes
use App\Core\AbstractModel;

class RequestModel extends AbstractModel {

    /**
     * Sélectionne l'ensemble des requêtes de la table request
     * @return array Le tableau contenant les requêtes clients
     */
    function getAllRequests(): array
    {
        
        // Préparation de la requête
        $sql = 'SELECT * FROM request';
        $pdoStatement = self::$pdo->prepare($sql);
        
        // Exécution de la requête
        $pdoStatement->execute();

        // On retourne tous les résultats de la requête
        $results = $pdoStatement->fetchAll();

        // PHP < 8.0.0 : si on récupère la valeur false de la méthode fetchAll(), on retourne un tableau vide
        if (!$results) {
            return [];
        }

        return $results;
    }

    /**
     * Crée une requête client dans la table request
     */
    function createRequest($lastname, $firstname, $email, $content, $phone, $filename, $subject_id): bool
    {
        // Préparation de la requête client
        $sql = 'INSERT INTO request (firstname, lastname, email, content, phone, filename, subject_id) VALUES (?,?,?,?,?,?,?)';
        $pdoStatement = self::$pdo->prepare($sql);
        
        // Exécution de la requête
        $sqlStatus = $pdoStatement->execute([$firstname, $lastname, $email, $content, $phone, $filename, $subject_id]);
        
        return $sqlStatus;

    }

    /**
     * Supprime une requête client dans la table request
     */
    function deleteRequest($id_request) {
        $sql = 'DELETE FROM request WHERE id_request = ?';
        $pdoStatement = self::$pdo->prepare($sql);

        $sqlStatus = $pdoStatement->execute([$id_request]);

        return $sqlStatus;
    }
}
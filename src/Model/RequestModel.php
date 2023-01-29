<?php 

// Définition du namespace
namespace App\Model;

//Import des classes
use App\Entity\Status;
use App\Entity\Request;
use App\Entity\Subject;
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

        ///////////////////////////////////////////////////////////
        // Création des objets Request à partir du tableau de résultats

        // Création d'un tableau pour stocker les objets
        $requests = [];

        // Instanciation des modèles
        $subjectModel = new SubjectModel;
        $statusModel = new StatusModel;


        // On parcourt les résultats, pour chaque requête (tableau associatif)...
        foreach ($results as $result) {


            // ... on instancie les classes Subject et Status
            $subject = $subjectModel->getOneSubjectById($result['subject_id']);
            $status = $statusModel->getOneStatusById($result['status_id']);

            
            // Instanciation de l'objet Request
            $request = new Request(
                $result['id_request'],
                $result['createdAt'],
                $result['firstname'],
                $result['lastname'],
                $result['email'],
                $result['content'],
                $result['phone'],
                $result['filename'],
                $subject,
                $status
            );



            // On ajoute l'objet Request dans le tableau de requêtes
            $requests[] = $request;
        }

        // On retourne Le tableau de requêtes
        return $requests;

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

    function getOneRequestById(?int $id_request): Request 
    {
        // Préparation de la requête
        $sql = 'SELECT * FROM request WHERE id_request = ?';
        $pdoStatement = self::$pdo->prepare($sql);

        // Exécution dde la requête
        $pdoStatement->execute([$id_request]);

        // Récupération du résultat 
        $requestData = $pdoStatement->fetch();
        if (!$requestData) {
            return [];
        }
        
        $subjectModel = new SubjectModel;
        $statusModel = new StatusModel;

        $subject = $subjectModel->getOneSubjectById($requestData['subject_id']);
        $status = $statusModel->getOneStatusById($requestData['status_id']);

        
        // Instanciation de l'objet Request
        $request = new Request(
            $requestData['id_request'],
            $requestData['createdAt'],
            $requestData['firstname'],
            $requestData['lastname'],
            $requestData['email'],
            $requestData['content'],
            $requestData['phone'],
            $requestData['filename'],
            $subject,
            $status
        );

        return $request;
    }

    function updateRequest($id_request, $status_id) {
        $sql = 'UPDATE request SET status_id = ? WHERE id_request = ?';
        $pdoStatement = self::$pdo->prepare($sql);

        $sqlStatus = $pdoStatement->execute([$status_id, $id_request]);

        return $sqlStatus;
    }
}
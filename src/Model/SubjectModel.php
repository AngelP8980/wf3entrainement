<?php 

// Définition du namespace
namespace App\Model;

//Import des classes
use App\Core\AbstractModel;

class SubjectModel extends AbstractModel {

    /**
     * Sélectionne l'ensemble des sujets de la table subjects
     * @return array Le tableau contenant les sujets 
     */
    function getAllSubjects(): array
    {
        
        // Préparation du sujet
        $sql = 'SELECT * FROM subject';
        $pdoStatement = self::$pdo->prepare($sql);
        
        // Exécution du sujet
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
     * Crée un sujet dans la table subjects
     */
    function createSubject($id_subject, $subject_label): bool
    {
        // Préparation du sujet
        $sql = 'INSERT INTO subjects (id_subject, subject_label) VALUES (?,?)';
        $pdoStatement = self::$pdo->prepare($sql);
        
        // Exécution du sujet
        $sqlSubject = $pdoStatement->execute([$id_subject, $subject_label]);
        
        return $sqlSubject;

    }

    /**
     * Supprime un sujet dans la table subject
     */
    function deleteSubject($id_subject) {
        $sql = 'DELETE FROM subjects WHERE id_subject = ?';
        $pdoStatement = self::$pdo->prepare($sql);

        $sqlSubject = $pdoStatement->execute([$id_subject]);

        return $sqlSubject;
    }
}
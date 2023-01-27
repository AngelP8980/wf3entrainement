<?php 

// Définition du namespace
namespace App\Model;

// Import des classes
use App\Core\AbstractModel;

class UserModel extends AbstractModel {

    function getUserByEmail(string $email): array 
    {
        // Préparation de la requête
        $sql = 'SELECT * FROM users WHERE email = ?';
        $pdoStatement = self::$pdo->prepare($sql);

        // Exécution de la requête
        $pdoStatement->execute([$email]);

        // Récupération du résultat 
        $users = $pdoStatement->fetch();

        if (!$users) {
            return [];
        }
        return $users;
    }

    /** 
     * Insère un utilisateur en base de données
     */
    function insertUser(string $firstname, string $lastname, string $email, string $password)
    {
        // Hashage du mot de passe
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // Insertion des données 
        $sql = 'INSERT INTO users (firstname, lastname, email, password)
                VALUES (?, ?, ?, ?)';

        $pdoStatement = self::$pdo->prepare($sql);
        $pdoStatement->execute([$firstname, $lastname, $email, $passwordHash]);
    }
}
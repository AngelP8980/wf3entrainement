<?php 

/**
 * On définit dans le tableau associatif $routes la liste de nos routes.
 * Pour chaque route, on définit : 
 * - son nom 
 * - path (qui apparaît dans l'URL)
 * - controller : fichier à appeler 
 */

$routes = [

    // Page d'accueil
    'home' => [
        'path' => '/',
        'controller' => 'home.php'
    ],

    // Demande client
    'addRequest' => [
        'path' => '/requests/add',
        'controller' => 'requests/request-add.php'
    ],

    // Liste des demandes clients
    'request' => [
        'path' => '/requests',
        'controller' => 'requests/request-list.php'
    ],

    // Modifie la demande client
    'editRequest' => [
        'path' => '/requests/edit',
        'controller' => 'requests/request-edit.php'
    ],

    // Supprime la demande client
    'deleteRequest' => [
        'path' => '/requests/delete',
        'controller' => 'requests/request-delete.php'
    ],

    // Liste des sujets de requête
    'subject' => [
        'path' => '/subjects',
        'controller' => 'subjects/subject-list.php'
    ],

    // Liste des statuts
    'status' => [
        'path' => '/status',
        'controller' => 'status/status-list.php'
    ],

    // Création de compte
    'signup' => [
        'path' => '/signup',
        'controller' => 'signup.php'
    ],

    // Connexion utilisateur
    'login' => [
        'path' => '/login',
        'controller' => 'login.php'
    ],

    // Déconnexion
    'logout' => [
        'path' => '/logout',
        'controller' => 'logout.php'
    ],
];

return $routes;
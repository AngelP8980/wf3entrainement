<?php 

use App\Model\StatusModel;
use App\Model\RequestModel;

$requestModel = new RequestModel;
$statusModel = new StatusModel;

if (isset ($_POST['submit'])) {
    var_dump($_POST);

    // TODO rajouter valide INT et tester status_id

   $status_id = intVal($_POST['status_id']); 

    $sqlStatus = $requestModel->updateRequest($_GET['id_request'], $status_id);
    if ($sqlStatus) {
        addFlash("Le statut de la requête a bien été modifié.");
        // Redirection 
        header('Location: /');
        exit;
    } else {
        addFlash("Le statut de la requête n'a pas pu être modifié.");

    }
    
}

$allStatus = $statusModel->getAllStatus();

$request = $requestModel->getOneRequestById($_GET['id_request']);

// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'requests/request-edit';
include '../templates/base.phtml';
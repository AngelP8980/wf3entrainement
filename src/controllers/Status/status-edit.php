<?php 

use App\Model\StatusModel;

if (isset ($_POST['submit'])) {
    var_dump($_POST);
    // Si validateString renvoie une string : l'ajoute en message
    addFlash(validateString('number', 'id_status',0,255)); ///
    addFlash(validateString('label', 'status_label',0,255));

    if (!hasFlash()) {
        var_dump($_FILES);
        $id_status = intVal($_POST['id_status']); 
        $status_label = trim($_POST['label']);

        $statusModel = new StatusModel;
        $sqlStatus = $statusModel->editStatus($id_status, $status_label);
        if (!$sqlStatus) {
            addFlash("La modification du statut n'a pas abouti, veuillez réessayer ultérieurement.");
        } else {
            // Ajouter un message flash
            addFlash('Le statut a bien été modifié.');
        
            // Redirection 
            header('Location: /');
            exit;
        }
    }
}


// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'status/status-edit';
include '../templates/base.phtml';
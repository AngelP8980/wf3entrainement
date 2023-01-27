<?php 

use App\Model\RequestModel;

if (isset ($_POST['submit'])) {
    var_dump($_POST);
    // Si validateString renvoie une string : l'ajoute en message
    addFlash(validateString('nom', 'lastname',0,255));
    addFlash(validateString('prénom', 'firstname',0,255));
    addFlash(validateString('email', 'email',0,255));
    addFlash(validatePhone('téléphone', 'phone',0,255));
    addFlash(validateString('message', 'content',100,1000));
    // TODO rajoute valide INT et tester subject_id

    if (!hasFlash()) {
        var_dump($_FILES);
        $lastname = trim($_POST['lastname']);
        $firstname = trim($_POST['firstname']);
        $email = trim($_POST['email']);
        $content = trim($_POST['content']);
        $phone = $_POST['phone'] ? trim($_POST['phone']): null;
        $filename = isset($_FILES['document']) ? $_FILES['document']['name']: null;
        $subject_id = intVal($_POST['subject_id']); 
        $requestModel = new RequestModel;
        $sqlStatus = $requestModel-editRequest($sqlStatus);
        if (!$sqlStatus) {
            addFlash("Le statut de la requête a bien été modifié.");
        } else {
        
            // Redirection 
            header('Location: /');
            exit;
        }
    }
}


// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'requests/request-edit';
include '../templates/base.phtml';
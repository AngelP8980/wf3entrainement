<?php 

use App\Model\SubjectModel;

if (isset ($_POST['submit'])) {
    var_dump($_POST);
    // Si validateString renvoie une string : l'ajoute en message
    addFlash(validateString('number', 'id_subject',0,255)); ///
    addFlash(validateString('label', 'subject_label',0,255));

    if (!hasFlash()) {
        var_dump($_FILES);
        $id_subject = intVal($_POST['id_subject']); 
        $subject_label = trim($_POST['label']);

        $subjectModel = new SubjectModel;
        $sqlSubject = $subjectModel->editSubject($id_subject, $subject_label);
        if (!$sqlSubject) {
            addFlash("La modification du sujet n'a pas abouti, veuillez réessayer ultérieurement.");
        } else {
            // Ajouter un message flash
            addFlash('Le sujet a bien été modifié.');
        
            // Redirection 
            header('Location: /');
            exit;
        }
    }
}


// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'subjets/subject-edit';
include '../templates/base.phtml';
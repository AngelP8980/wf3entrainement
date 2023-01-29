<?php 

use App\Model\SubjectModel;
use App\Model\RequestModel;

$subjectModel = new SubjectModel;

if (isset ($_POST['submit'])) {
    var_dump($_POST);

    $subject_id = intVal($_POST['subject_id']); 

    $sqlSubject = $subjectModel->updateSubject($_GET['id_subject'], $subject_id);
    if ($sqlSubject) {
        addFlash("Le sujet a bien été modifié.");
        // Redirection 
        header('Location: /');
        exit;
    } else {
        addFlash("Le sujet n'a pas pu être modifié.");

    }
    
}

$allStatus = $statusModel->getAllStatus();

$request = $requestModel->getOneRequestById($_GET['id_request']);

// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'subjets/subject-edit';
include '../templates/base.phtml';
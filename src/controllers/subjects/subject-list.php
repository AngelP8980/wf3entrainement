<?php 

use App\Model\SubjectModel;

$subjectModel = new SubjectModel;

$clientData = $subjectModel->getAllSubjects();



// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'subjets/subject-list';
include '../templates/base.phtml';
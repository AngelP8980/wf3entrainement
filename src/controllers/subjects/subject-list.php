<?php 

use App\Model\SubjectModel;

$subjectModel = new SubjectModel;

$subjectData = $subjectModel->getAllSubjects();



// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'subjects/subject-list';
include '../templates/base.phtml';
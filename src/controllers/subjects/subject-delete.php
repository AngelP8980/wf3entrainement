<?php

use App\Model\SubjectModel;

$subjectModel = new SubjectModel;

$id_subject = $_GET['id_subject'];

$sqlSubject= $subjectModel->deleteSubject($id_subject);
if ($sqlSubject) {
    addFlash('Sujet n°'.$id_subject.' a bien été supprimé.');
} else {
    addFlash('Sujet n°'.$id_subject.' n\'a pas été supprimé.');
}



header('Location: /subjects');
exit;
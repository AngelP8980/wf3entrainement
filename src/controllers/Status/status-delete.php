<?php

use App\Model\StatusModel;

$statusModel = new StatusModel;

$id_status= $_GET['id_status'];

$sqlStatus = $statusModel->deleteStatus($id_status);
if ($sqlStatus) {
    addFlash('Statut n°'.$id_statut.' a bien été supprimé.');
} else {
    addFlash('Statut n°'.$id_status.' n\'a pas été supprimé.');
}



header('Location: /status');
exit;
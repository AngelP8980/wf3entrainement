<?php

use App\Model\RequestModel;

$requestModel = new RequestModel;

$id_request = $_GET['id_request'];

$sqlStatus = $requestModel->deleteRequest($id_request);
if ($sqlStatus) {
    addFlash('Requête n°'.$id_request.' a bien été supprimée.');
} else {
    addFlash('Requête n°'.$id_request.' n\'a pas été supprimée.');
}



header('Location: /requests');
exit;
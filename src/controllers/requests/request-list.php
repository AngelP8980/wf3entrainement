<?php 

use App\Model\RequestModel;

$requestModel = new RequestModel;

$clientData = $requestModel->getAllRequests();



// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'requests/request-list';
include '../templates/base.phtml';
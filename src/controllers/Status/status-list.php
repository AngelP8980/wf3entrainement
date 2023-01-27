<?php 

use App\Model\StatusModel;

$statusModel = new StatusModel;

$clientData = $statusModel->getAllStatus();



// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'status/status-list';
include '../templates/base.phtml';
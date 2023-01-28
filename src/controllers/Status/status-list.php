<?php 

use App\Model\StatusModel;

$statusModel = new StatusModel;

$statusData = $statusModel->getAllStatus();



// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'status/status-list';
include '../templates/base.phtml';
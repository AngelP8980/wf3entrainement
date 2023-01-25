<?php 

if (isset ($_POST['submit'])) {
    var_dump($_POST);
    // Si validateString renvoie une string : l'ajoute en message
    addFlash(validateString('nom', 'lastname',0,255));
    addFlash(validateString('prénom', 'firstname',0,255));
    addFlash(validateString('email', 'email',0,255));
    addFlash(validatePhone('téléphone', 'phone',0,255));
    addFlash(validateString('message', 'message',100,1000));
}


// Flash messages
$flashMessage = fetchFlash();

// Affichage : inclusion du template
$template = 'request';
include '../templates/base.phtml';
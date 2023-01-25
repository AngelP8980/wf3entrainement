<?php

function validateString($inputName, $inputValue, $inputMinlength=0, $inputMaxlength=255) {
    if (!isset ($_POST[$inputValue])) {
        return "Le champ ".$inputName." est manquant :-(";
    } elseif (empty ($_POST[$inputValue])) {
        return "Le champ ".$inputName." est vide :-(";
    } elseif (strlen($_POST[$inputValue]) > $inputMaxlength) {
        return "Le champ ".$inputName." dépasse le nombre de caractères maximum autorisés (".$inputMaxlength.")";
    } elseif (strlen($_POST[$inputValue]) < $inputMinlength) {
        return "Le champ ".$inputName." ne possède pas le nombre de caractères minimum requis (".$inputMinlength.")";
    }
    return;
}

function validatePhone($inputName, $inputValue, $inputMinlength=0, $inputMaxlength=255) {
    if (!isset ($_POST[$inputValue])) {
        return "Le champ ".$inputName." est manquant :-(";
    } elseif (strlen($_POST[$inputValue]) > $inputMaxlength) {
        return "Le champ ".$inputName." dépasse le nombre de caractères maximum autorisés (".$inputMaxlength.")";
    } elseif (strlen($_POST[$inputValue]) < $inputMinlength) {
        return "Le champ ".$inputName." ne possède pas le nombre de caractères minimum requis (".$inputMinlength.")";
    }
    return;
}

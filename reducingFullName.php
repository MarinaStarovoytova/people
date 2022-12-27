<?php 
// Сокращение ФИО 
function getShortName ($fullName) {
    $arrayNewKeys[] = getPartsFromFullname ($fullName);
    $reduction = $arrayNewKeys[0]['name'] .' '. mb_substr($arrayNewKeys[0]['surname'], 0, 1).'.';
    return $reduction;
    }
    
?>
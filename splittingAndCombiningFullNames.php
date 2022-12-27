<?php 
// Разбиение и объединение ФИО 
function getFullnameFromParts ($lastN, $firstN, $patron) {
    $line = $lastN . ' '.$firstN .' '.$patron;
    return $line;
}

function getPartsFromFullname ($fullName) {
    $separation = explode(' ', $fullName);
    $arrayNewKeys = [
        'surname' => $separation[0], 
        'name' => $separation[1], 
        'patronymic' => $separation[2]
    ];
    return $arrayNewKeys;
}

?>
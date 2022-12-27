<?php 
// идеальный побор пары

function getPerfectPartner($lastN, $firstN, $patron, $array) {
    $lastN = mb_convert_case($lastN, MB_CASE_TITLE_SIMPLE);
    $firstN = mb_convert_case($firstN, MB_CASE_TITLE_SIMPLE);
    $patron = mb_convert_case($patron, MB_CASE_TITLE_SIMPLE);

    $string = getFullnameFromParts ($lastN, $firstN, $patron);

    $gender1 = getGenderFromName($string);

    do {
        $i = rand(0, count($array) -1);
        $gender2 = getGenderFromName($array[$i]);
    } while ($gender1 === $gender2 xor $gender2 === 0);

    return $array[$i];





}

?>
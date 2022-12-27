<?php 
// Определение возрастно-полового состава
function getGenderDescription ($array) {
    $countingArray = count($array); // подсчет массива

    $numberBattles = [];
    $battleMale = [];
    $battleFemale = [];
    $battleIndefinite = [];

    foreach($array as $key => $value) {
    $spaceship = getGenderFromName($array[$key]);
    array_push($numberBattles, $spaceship); 
    }

    function male($var) {
        return $var === 1;
    }

    function female($var) {
        return $var === -1;
    }

    function indefinite($var) {
        return $var === 0;
    }

    $battleMale = array_filter($numberBattles, "male");
    $male = count($battleMale);
    $battleFemale = array_filter($numberBattles, "female");
    $female = count($battleFemale);
    $battleIndefinite = array_filter($numberBattles, "indefinite");
    $indefinite = count($battleIndefinite);

    $malePercent = round(($male / $countingArray) * 100, 1);
    $femalePercent = round(($female / $countingArray) * 100, 1);
    $indPercent = round(($indefinite / $countingArray) * 100, 1);

    return $array = [$malePercent, $femalePercent, $indPercent];

}





?>
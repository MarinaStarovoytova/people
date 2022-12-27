<?php 

include 'examplePersonsArray.php';
include 'splittingAndCombiningFullNames.php';
include 'reducingFullName.php';
include 'genderByFullName.php';
include 'ageAndGenderComposition.php';
include 'getPerfectPartner.php';

foreach ($example_persons_array as $key => $value) {
    $fullName[] = $example_persons_array[$key]['fullname'];
    $separationName[] = explode(' ', $fullName[$key]);
    $surname[] = $separationName[$key][0];
    $name[] = $separationName[$key][1];
    $patronymic[] = $separationName[$key][2];
}

// print_r($fullName);
// print_r($surname);
// print_r($name);
// print_r($patronymic);


foreach ($fullName as $key => $value) {
    $gluedString = getFullnameFromParts ($surname[$key], $name[$key], $patronymic[$key]);
    echo "-------------------------------------------- \n";
    echo "Функция getFullnameFromParts (строка, склеенная через пробел): ".$gluedString."\n";

    $arrayPeople[] = getPartsFromFullname ($gluedString);
    echo "Функция getPartsFromFullname: (массив): \n";
    print_r($arrayPeople[$key]);

    $abbreviationFullName = getShortName($gluedString);
    echo "Функция getShortName: (Сокращение ФИО): $abbreviationFullName\n";

    $spaceship = getGenderFromName($gluedString);
    switch ($spaceship <=> 0) {
        case 1:
            echo "Функция getGenderFromName: (Определение пола по ФИО): $spaceship - мужской пол\n";
            break;
        case -1:
            echo "Функция getGenderFromName: (Определение пола по ФИО): $spaceship - женский пол\n";
            break;
        case 0:
            echo "Функция getGenderFromName: (Определение пола по ФИО): $spaceship - неопределенный пол\n";
            break;
    }
    
}

$arrayPersent = getGenderDescription($fullName);
echo "\n","Гендерный состав аудитории:\n";
echo "---------------------------\n";
echo "Мужчины - $arrayPersent[0]%\n";
echo "Женщины - $arrayPersent[1]%\n";
echo "Не удалось определить - $arrayPersent[2]%\n";


do {
    $i = rand(0, count($fullName) -1);
    $genderPerson1 = getGenderFromName($fullName[$i]);
} while ($genderPerson1 === 0);

$lower = mb_strtolower($surname[$i]);
$upper = mb_strtoupper($name[$i]);
$change = mb_strtoupper($patronymic[$i]);

$person = getPerfectPartner($lower, $upper, $change, $fullName);
$rand = rand(50, 100 - 1) + (random_int(0, PHP_INT_MAX - 1) / PHP_INT_MAX);
$persent = round($rand, 2);

$abbrevName1 = getShortName($fullName[$i]);
$abbrevName2 = getShortName($person);

echo "\n","$abbrevName1 + $abbrevName2 = \n\u{1F49A}Идеально на $persent%\u{1F49A}";

?>
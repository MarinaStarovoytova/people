<?php 
// Функция определения пола по ФИО

function getGenderFromName($fullName) {
    $array = getPartsFromFullname($fullName);
    $battle = 0;

    mb_substr($array['patronymic'], -2) === "ич" ? $battle ++ : 0;
    mb_substr($array['name'], -1) === "й" ? $battle ++ : 0;
    mb_substr($array['name'], -1) === "н" ? $battle ++ : 0;
    mb_substr($array['surname'], -1) === "в" ? $battle ++ : 0;

    mb_substr($array['patronymic'], -3) === "вна" ? $battle -- : 0;
    mb_substr($array['name'], -1) === "а" ? $battle -- : 0;
    mb_substr($array['surname'], -2) === "ва" ? $battle -- : 0;

    // if (mb_substr($array['patronymic'], -2) === "ич" 
    // || (mb_substr($array['name'], -1) === "й") 
    // || (mb_substr($array['name'], -1) === "н") 
    // ||  mb_substr($array['surname'], -1) === "в") {
    //     $battle ++;
    // }

    // if (mb_substr($array['patronymic'], -3) === "вна" 
    // || mb_substr($array['name'], -1) === "а" 
    // || mb_substr($array['surname'], -2) === "ва") {
    //     $battle --;
    // } 

    return $battle <=> 0;

}
?>

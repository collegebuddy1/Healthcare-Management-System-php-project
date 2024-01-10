<?php

function dateToDBFormat($date) {
    $formated = date_create($date);
    $formated = date_format($formated,"Y-m-d");
    return $formated;
}

function timeToDBFormat($time) {
    if($time=="12:00 am")
        $time="00:00:00";
    else if($time=="12:00 pm")
        $time="12:00:00";
    else if(strstr($time," am")){
        $time = rtrim($time," am");
        $time .= ":00";
    }else{
        $time = rtrim($time," pm");
        $time .= ":00";
        $time = new DateTime($time);
        $time->add(new DateInterval('PT12H0M00S'));
        $time = $time->format('H:i:s');
    }
    return $time;
}

?>
<?php

function format_date_project($date)
{
    $months = sfConfig::get('app_months',array());

    $_strtotime = strtotime($date);
    $y = date('Y',$_strtotime);
    $m = intval(date('m',$_strtotime));
    $d = date('d',$_strtotime);

    $date = $d . ' '. $months[$m] . ' ' . $y;
 
    return $date;
}

function format_date_time_project($date)
{
    $months = sfConfig::get('app_months',array());

    $_strtotime = strtotime($date);
    $y = date('Y',$_strtotime);
    $m = intval(date('m',$_strtotime));
    $d = date('d',$_strtotime);

    $date = $d . ' '. $months[$m] . ' ' . $y;
 
    $time = date("H:i", strtotime($time));
 
    return $date . '' . $time;
}

function format_time_project($time)
{
    $time = date("H:i", strtotime($time));
 
    return $time;
}

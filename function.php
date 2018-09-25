<?php

const DAY_IN_MONTH = 21;
const DAY_IN_MONTH_DIFFERENCE = 1;
const WEEK = array('Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота');
const START_WEEK_DAY_START_YEAR = 1;
const START_YEAR = 1900;
const YEAR_MONTHS = 13;
const YEAR_DAYS_DIFFERENCE = -1;
define("YEAR_DAYS", (YEAR_MONTHS * DAY_IN_MONTH) + (ceil(YEAR_MONTHS / 2) * DAY_IN_MONTH_DIFFERENCE));


function get_dayweek($year, $month, $day)
{
    $count = $year - START_YEAR;
    $days_in_full_year = 0;
    if ($count > 0) {
        $days_in_full_year = $count * YEAR_DAYS + ((floor($count / 5) + 1) * YEAR_DAYS_DIFFERENCE);
        if (floor($count / 5) == $count / 5) $days_in_full_year = $days_in_full_year - YEAR_DAYS_DIFFERENCE;
    }
    $days_in_full_month = 0;
    if ($month > 1) {
        $days_in_full_month = (($month - 1) * DAY_IN_MONTH) + (floor($month / 2) * DAY_IN_MONTH_DIFFERENCE);
    }
    $all_days = $days_in_full_year + $days_in_full_month + $day;
    $in_current_week = $all_days - (floor($all_days / count(WEEK)) * count(WEEK));
    return WEEK[$in_current_week - 1 + START_WEEK_DAY_START_YEAR];
}

?>
<?php  

function changeDateFormat($format = 'Y-m-d', $originalDate)
{
    return date($format, strtotime($originalDate));
}

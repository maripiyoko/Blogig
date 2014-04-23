<?php

function is_valid_date_range($date_string)
{
    $border_unix_time = strtotime('1970-01-01');
    try {
        $date = new DateTime($date_string);
        if($date->getTimestamp() <= $border_unix_time) {
            return FALSE;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        return FALSE;
    }
    return TRUE;
}

/* end of MY_date_helper.php */
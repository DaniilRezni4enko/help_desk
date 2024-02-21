<?php
function ShowMessageStr($data) {
    $reason = $data['reason'];
    $date = $data['data'];
    $text = $data['text'];
    $level = $data['level'];
    echo $reason;
    echo $date;
    echo $text;
    echo $level;
}
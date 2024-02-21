
<?php
function Show_str($mass) {
    $id = $mass['id'];
    $reason = $mass['reason'];
    $level = $mass['level'];
    $text = $mass['text'];
    $date = $mass['date'];
    echo "
            <a class='table' href='/Messages/$id'><li class='table-row'>
            <div class='col col-1' data-label='Job Id'>$reason</div>
            <div class='col col-2' data-label='Customer Name'>$level</div>
            <div class='col col-3' data-label='Amount'>$text</div>
            <div class='col col-4' data-label='Payment Status'>$date</div>
            </li></a>
            ";
}

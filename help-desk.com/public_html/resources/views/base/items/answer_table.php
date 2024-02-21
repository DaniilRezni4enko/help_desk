<?php

function ShowAnswerTable($mass) {
    $id = $mass['id'];
    if (strlen($mass['reason']) > 8) {
        $reason = substr($mass['reason'], 0, 14) . '...';
    }
    $reason = $mass['reason'];
    if (strlen($mass['text']) > 8) {
        $text = substr($mass['text'], 0, 14) . '...';
    }
    $text = $mass['text'];
    echo "
            <a class='table' href='/answer/$id'><li class='table-row'>
            <div class='col col-2' data-label='Job Id'>$text</div>
            <div class='col col-2' data-label='Customer Name'>$reason</div>
            </li></a>
            ";
}

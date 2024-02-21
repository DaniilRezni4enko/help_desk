<?php
function Show_header($title, $head) {
    echo "<!DOCTYPE html>
<title>$title</title>
<link href='/resources/css/table.css' rel='stylesheet' type='text/css'>
<div class='container'>
    <h2>$head</h2>
    <ul class='responsive-table'>
        <li class='table-header'>
            <div class='col col-1 head'>Причина</div>
            <div class='col col-2 head'>Уровень важности</div>
            <div class='col col-3 head'>Текст заявки</div>
            <div class='col col-4 head'>Дата отправления</div>
        </li>";
}
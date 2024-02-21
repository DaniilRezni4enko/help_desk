<?php

function Show_answer_header($title, $head) {
    echo "<!DOCTYPE html>
<title>$title</title>
<link href='/resources/css/table.css' rel='stylesheet' type='text/css'>
<div class='container'>
    <h2>$head</h2>
    <ul class='responsive-table'>
        <li class='table-header'>
            <div class='col col-2 head'>Ответ</div>
            <div class='col col-2 head'>Заявка от пользователя</div>
        </li>";
}

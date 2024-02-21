<?php
 function Show($all, $chek) {
     echo "<link rel='stylesheet' type='text/css' href='/resources/css/block.css'>
<div class='container'>
    <div class='card'>
        <div class='card__body'>
            <h4>Всего заявок: $all</h4>
            <h4>Рассмотренно: $chek</h4>
        </div>
        <div class='card__footer'>
            </div>
        </div>
    </div>
    
</div>";
 }
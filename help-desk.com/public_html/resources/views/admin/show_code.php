<?php
function ShowCode($code) {
    echo "<link rel='stylesheet' type='text/css' href='/resources/css/start_auth.css'>
            <div class='login'>
                <h1>Ваш код:</h1>
                <h1>$code<h1>
                <h1>Выдайте его пользователям, чтобы они могли авторизироваться в системе.</h1>
            </div>
            <button class='btn btn-primary btn-block btn-large'><a href='Create_admin'>Создать администратора</a></button>
            ";

}
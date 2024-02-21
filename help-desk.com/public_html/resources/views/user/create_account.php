<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="/resources/css/start_auth.css">

<div class="login">
    <h1>Приветствуем в Help-Desk</h1>
    <form method="post" action="Register_Process">
        <input type="text" name="login" class="log" placeholder="Логин"/>
        <input type="text" name="name" class="name" placeholder="Имя" required="required" />
        <input type="text" name="surname" class="surname" placeholder="Фамилия" required="required" />
        <input type="text" name="patronymic" class="patronymic" placeholder="Отчество" required="required"/>
        <input type="password" name="password" class="password" placeholder="Пароль" required="required"/>
        <select name="post">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . "/bootstrap/Autoloader.php";
            $base = new BaseController();
            $n = $base->ChekCountNews();
            $n = $n[0];
            for ($i=1; $i < $n+1; $i++) {
                $result = $base->SelectPostsName($i);
                $ex = $result . '/' . $i;
                echo "<option class='post' value='$ex'>$result</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary btn-block btn-large" id="enter">Создать</button>
        <script src="/resources/js/user/registration.js"></script>
    </form>
</div>
